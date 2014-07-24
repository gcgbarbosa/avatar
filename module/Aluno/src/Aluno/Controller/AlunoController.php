<?php
namespace Aluno\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Aluno\Form\AlunoForm;
use Doctrine\ORM\EntityManager;
use Aluno\Entity\Aluno;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class AlunoController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }
 
    /**
     * Return a EntityManager
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        
        return $this->em;
    } 

    public function indexAction()
    {
        $alunos = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll();
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($alunos));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }

    public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            $alunos = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll();
            $cursos = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findAll();
            $request = $this->getRequest();
        
            if ($request->isPost()) {
                $post = $request->getPost();
                if ($post->selectcurso != '-1' || $post->radiobolsista != '-1') {
                    if ($post->selectcurso != '-1') {
                        $data['cursoAluno'] = $post->selectcurso;
                    }
                    if ($post->radiobolsista != '-1') {
                        if ($post->radiobolsista == '0') 
                            $data['bolsista'] = true;
                        if ($post->radiobolsista == '1')
                            $data['bolsista'] = false;
                    }
                    if (isset($data)) {
                        $alunos = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findBy($data);
                    }
                }
                return new ViewModel(array(
                    'alunos' => $alunos,
                    'cursos' => $cursos,
                ));
            }
            return new ViewModel(array(
                'alunos' => $alunos,
                'cursos' => $cursos
            ));
        }
        $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
        return new ViewModel(array(
            'aluno' => $aluno,
            'cursos' => $cursos
        ));
    }

    public function relatorioindividualAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('aluno', array('action'=>'index'));
        }
        $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
        $projetos = $aluno->getProjetoprojeto();
        $controle = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy(array('alunoControle' => $id));
        return new ViewModel(array(
            'aluno' => $aluno,
            'projetos' => $projetos,
            'controle' => $controle,
        ));
    }

    public function addAction()
    {
        $form = new AlunoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $aluno = new Aluno();
            
            $form->setInputFilter($aluno->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $aluno->populate($form->getData());

                var_dump($aluno->getMatriculaaluno());exit;

                $jaTemEsteAluno = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findBy(array('matriculaaluno' => $aluno->getMatriculaaluno()));

                if ($jaTemEsteAluno) {
                    $mensagem = 'Aluno já cadastrado.';
                    return array(
                        'form' => $form,
                        'mensagem' => $mensagem,
                    );
                }
                
                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $aluno->getCursoAluno()));
                $aluno->setCursoAluno($curso);
    
                //SET DATA NASC
                $data = explode("/", $aluno->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $aluno->setDatanasc(new \DateTime($data));
                //END SET DATA NASC

                //SET BOLSISTA
                if($aluno->getBolsista() == "true")
                    $aluno->setBolsista(true);
                else if($aluno->getBolsista() == "false")
                   $aluno->setBolsista(false);
                //END SET BOLSISTA
                $this->getEntityManager()->persist($aluno);
                $this->getEntityManager()->flush();
                // Redirect to list of albums
                return $this->redirect()->toRoute('aluno'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('aluno', array('action'=>'add'));
        } 
        
        $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
        //$aluno->setDatanasc(new \DateTime());

        $form = new AlunoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($aluno);
        $form->get('submit')->setAttribute('label', 'Edit');

        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $aluno->getCursoAluno()));
                $aluno->setCursoAluno($curso);

               // $this->getEntityManager()->flush();
                if($form->getData()->getBolsista() == "true")
                    $form->getData()->setBolsista(true);
                else if($form->getData()->getBolsista() == "false")
                   $form->getData()->setBolsista(false);

                //SET DATA NASC
                $data = explode("/", $form->getData()->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $form->getData()->setDatanasc(new \DateTime($data));
                //END SET DATA NASC
                $this->getEntityManager()->persist($aluno);
                $this->getEntityManager()->flush();
                // Redirect to list of albums
                return $this->redirect()->toRoute('aluno');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('aluno');
        }

        $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);

        return new ViewModel(array(
            'aluno' => $aluno,
        ));
    }


    public function deleteAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('aluno');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
                
                if ($aluno) {
                    $this->getEntityManager()->remove($aluno);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('aluno');
        }

        return array(
            'id' => $id,
            'aluno' => $this->getEntityManager()->find('Aluno\Entity\Aluno', $id)
        );
    }
}
