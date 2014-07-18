<?php
namespace Curso\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Curso\Form\CursoForm;
use Doctrine\ORM\EntityManager;
use Curso\Entity\Curso;

class CursoController extends AbstractActionController
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
        return new ViewModel(array(
            'cursos' => $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findAll() 
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('curso');
        }

        $curso = $this->getEntityManager()->find('Curso\Entity\Curso', $id);

        return new ViewModel(array(
            'curso' => $curso,
        ));
    }

    public function relatorioindividualAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('curso', array('action'=>'index'));
        }
        $curso = $this->getEntityManager()->find('Curso\Entity\Curso', $id);
    
        return new ViewModel(array(
           'curso' => $curso,
        ));
    }

    public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            $cursos = $this->getEntityManager()->getRepository('Curso\Entity\Curso')->findAll();
            return new ViewModel(array(
                'cursos' => $cursos
            ));
        }
        $aluno = $this->getEntityManager()->find('Curso\Entity\Curso', $id);
        return new ViewModel(array(
            'curso' => $curso
        ));
    }



    public function addAction()
    {
        $form = new CursoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $curso = new Curso();
            
            $form->setInputFilter($curso->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $curso->populate($form->getData()); 

                $departamento = $this->getEntityManager()->getRepository('Professor\Entity\Departamento')->findOneBy(array('iddepartamento' => $curso->getDepartamentoCurso()));
                $curso->setDepartamentoCurso($departamento);
                
                $this->getEntityManager()->persist($curso);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('curso'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('curso', array('action'=>'add'));
        } 
        
        $curso = $this->getEntityManager()->find('Curso\Entity\Curso', $id);

        $form = new CursoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($curso);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $departamento = $this->getEntityManager()->getRepository('Professor\Entity\Departamento')->findOneBy(array('iddepartamento' => $curso->getDepartamentoCurso()));
                $curso->setDepartamentoCurso($departamento);

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('curso');
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
            return $this->redirect()->toRoute('curso');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $curso = $this->getEntityManager()->find('Curso\Entity\Curso', $id);
                
                if ($curso) {
                    $this->getEntityManager()->remove($curso);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('curso');
        }

        return array(
            'id' => $id,
            'curso' => $this->getEntityManager()->find('Curso\Entity\Curso', $id)
        );
    }
}
