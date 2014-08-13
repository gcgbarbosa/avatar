<?php

namespace Professor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Professor\Form\ProfessorForm;
use Doctrine\ORM\EntityManager;
use Professor\Entity\Professor;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class ProfessorController extends AbstractActionController
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
        /*return new ViewModel(array(
            'professores' => $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll() 
        ));*/
        //$professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll();
        $professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findBy(array(),array('nomeprofessor' => 'ASC'));
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($professores));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }


    public function relatorioindividualAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('professor', array('action'=>'index'));
        }
        $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $id);
        $projetos = $professor->getProjetoprojeto()->toArray();
    //    $controle = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy(array('alunoControle' => $id));
        return new ViewModel(array(
            'professor' => $professor,
            'projetos' => $projetos,
           // 'controle' => $controle,
        ));
    }


    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('professor');
        }

        $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $id);

        return new ViewModel(array(
            'professor' => $professor,
        ));
    }
    public function addAction()
    {
        $form = new ProfessorForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $professor = new Professor();
            
            $form->setInputFilter($professor->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $professor->populate($form->getData()); 
                
                $jaTemEsteProfessor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findBy(array('matriculaprofessor' => $professor->getMatriculaprofessor()));

                if ($jaTemEsteProfessor) {
                    $mensagem = 'Professor já cadastrado.';
                    return array(
                        'form' => $form,
                        'mensagem' => $mensagem,
                    );
                }

                //SET DATA NASC
                $data = explode("/", $professor->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $professor->setDatanasc(new \DateTime($data));
                //END SET DATA NASC

                $departamento = $this->getEntityManager()->getRepository('Professor\Entity\Departamento')->findOneBy(array('iddepartamento' => $professor->getDepartamentodepartamento()));
                $professor->setDepartamentodepartamento($departamento);

                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $professor->getCursoProfessor()));
                $professor->setCursoProfessor($curso);
                //var_dump($album->getDepartamentodepartamento()->getIddepartamento());exit;

                $this->getEntityManager()->persist($professor);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('professor'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('professor', array('action'=>'add'));
        } 
        
        $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $id);

        $form = new ProfessorForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($professor);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
        
            if ($form->isValid()) {
                $form->bindValues();
                
                $departamento = $this->getEntityManager()->getRepository('Professor\Entity\Departamento')->findOneBy(array('iddepartamento' => $form->getData()->getDepartamentodepartamento()));
                $form->getData()->setDepartamentodepartamento($departamento);

                $curso = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findOneBy(array('idcurso' => $professor->getCursoProfessor()));
                $professor->setCursoProfessor($curso);
                //SET DATA NASC
                $data = explode("/", $form->getData()->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $form->getData()->setDatanasc(new \DateTime($data));
                //END SET DATA NASC

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('professor');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('professor');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $id);
                
                if ($professor) {
                    $this->getEntityManager()->remove($professor);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('professor');
        }

        return array(
            'id' => $id,
            'professor' => $this->getEntityManager()->find('Professor\Entity\Professor', $id)
        );
    }

        public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            $professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findBy(array(),array('nomeprofessor' => 'ASC'));
            $cursos = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findAll();
            $request = $this->getRequest();
            if ($request->isPost()) {
                $post = $request->getPost();
                if ($post->selectcurso != '-1') {
                    $data['cursoProfessor'] = $post->selectcurso;
                }
                if (isset($data)) {
                    $professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findBy($data,array('nomeprofessor' => 'ASC'));
                }
                return new ViewModel(array(
                    'professores' => $professores,
                    'cursos' => $cursos,
                ));
            }
            return new ViewModel(array(
                'professores' => $professores,
                'cursos' => $cursos,
            ));
        }
        $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $id);
        return new ViewModel(array(
            'professor' => $professor,
            'cursos' => $cursos,
        ));
    }
}
