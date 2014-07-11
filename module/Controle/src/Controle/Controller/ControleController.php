<?php
namespace Controle\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Controle\Form\ControleForm;
use Doctrine\ORM\EntityManager;
use Controle\Entity\Controle;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class ControleController extends AbstractActionController
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
        $controles = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy(array('statusControle' => 1));
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($controles));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }

    public function listarTodosAction() {
        $controles = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findAll();
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($controles));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }

    public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        $controles = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findAll();
        $alunos = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll();
        $cursos = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findAll();
        $salas = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findAll();
        $professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();
            if ($post->selectaluno != '-1' || $post->selectsala != '-1' || $post->selectcurso != '-1' || $post->selectresponsavel != '-1' || $post->data != "") {
                if ($post->selectaluno != '-1') {
                    $data['alunoControle'] = $post->selectaluno;
                }
                if ($post->selectcurso != '-1') {
                    $data['cursoControle'] = $post->selectcurso;
                }
                if ($post->selectsala != '-1') {
                    $data['salaControle'] = $post->selectsala;
                }
                if ($post->selectresponsavel != '-1') {
                    $data['responsavelControle'] = $post->selectresponsavel;
                }
                if ($post->data != '') {
                    $date = explode("/", $post->data);
                    $date = $date['2']."-".$date['1']."-". $date['0'];
                    $data['dataEntradaControle'] = new \DateTime($date);
                }
                $controles = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy($data);
            }
            else { 
                $controles = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findAll();
            }
            return new ViewModel(array(
                'controles' => $controles,
                'alunos' => $alunos,
                'cursos' => $cursos,
                'salas' => $salas,
                'professores' => $professores
            ));
        }

        return new ViewModel(array(
            'controles' => $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findAll(),
            'alunos' => $alunos,
            'cursos' => $cursos,
            'salas' => $salas,
            'professores' => $professores
        ));
    }

    public function addAction()
    {
        $form = new ControleForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $controle = new Controle();
            
            $form->setInputFilter($controle->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $controle->populate($form->getData());

                $aluno = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findOneBy(array('idaluno' => $controle->getAlunoControle()));
                $controle->setAlunoControle($aluno);
    
                $presentes = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy(array('statusControle' => true));

                foreach ($presentes as $presente) {
                    if ($presente->getAlunoControle() == $controle->getAlunoControle()) {
                        $mensagem = 'Aluno já está presente';
                        return array(
                            'form' => $form,
                            'mensagem' => $mensagem,
                        );
                    }
                }

                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $controle->getCursoControle()));
                $controle->setCursoControle($curso);

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $controle->getSalaControle()));
                $controle->setSalaControle($sala);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $controle->getResponsavelControle()));
                $controle->setResponsavelControle($professor);

                $controle->setDataEntradaControle(new \DateTime(date('Y-m-d H:i:s')));
                $controle->setDataSaidaControle(NULL);
                
                $controle->setStatusControle(true);
                
                $this->getEntityManager()->persist($controle);
                $this->getEntityManager()->flush();
                // Redirect to list of albums
                return $this->redirect()->toRoute('controle'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('controle', array('action'=>'add'));
        } 
        
        $controle = $this->getEntityManager()->find('Controle\Entity\Controle', $id);
        
        $form = new ControleForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($controle);
        $form->get('submit')->setAttribute('label', 'Edit');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $aluno = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findOneBy(array('idaluno' => $controle->getAlunoControle()));
                $controle->setAlunoControle($aluno);
    
                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $controle->getCursoControle()));
                $controle->setCursoControle($curso);

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $controle->getSalaControle()));
                $controle->setSalaControle($sala);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $controle->getResponsavelControle()));
                $controle->setResponsavelControle($professor);

                $controle->setDataSaidaControle(new \DateTime(date('Y-m-d H:i:s')));
                
                $controle->setStatusControle(false);
                
                $this->getEntityManager()->persist($controle);
                $this->getEntityManager()->flush();
                
                return $this->redirect()->toRoute('controle');
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
            return $this->redirect()->toRoute('controle');
        }

        $controle = $this->getEntityManager()->find('Controle\Entity\Controle', $id);

        return new ViewModel(array(
            'controle' => $controle,
        ));
    }

    public function saidaAction() {

        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('controle');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $controle = $this->getEntityManager()->find('Controle\Entity\Controle', $id);
                
                if ($controle) {
                    $aluno = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findOneBy(array('idaluno' => $controle->getAlunoControle()));
                    $controle->setAlunoControle($aluno);
        
                    $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $controle->getCursoControle()));
                    $controle->setCursoControle($curso);

                    $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $controle->getSalaControle()));
                    $controle->setSalaControle($sala);

                    $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $controle->getResponsavelControle()));
                    $controle->setResponsavelControle($professor);

                    $controle->setDataSaidaControle(new \DateTime(date('Y-m-d H:i:s')));
                    
                    $controle->setStatusControle(false);
                    
                    $this->getEntityManager()->persist($controle);
                    $this->getEntityManager()->flush();
                    
                    return $this->redirect()->toRoute('controle');
                }
            }

            return $this->redirect()->toRoute('controle');
        }

        return array(
            'id' => $id,
            'controle' => $this->getEntityManager()->find('Controle\Entity\Controle', $id)
        );
    }


    public function deleteAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('controle');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $controle = $this->getEntityManager()->find('Controle\Entity\Controle', $id);
                
                if ($controle) {
                    $this->getEntityManager()->remove($controle);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('controle');
        }

        return array(
            'id' => $id,
            'controle' => $this->getEntityManager()->find('Controle\Entity\Controle', $id)
        );
    }
}
