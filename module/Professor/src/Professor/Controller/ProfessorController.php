<?php

namespace Professor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Professor\Form\ProfessorForm;
use Doctrine\ORM\EntityManager;
use Professor\Entity\Professor;

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
        return new ViewModel(array(
            'professores' => $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll() 
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
                
                $professor->setDatanasc(new \DateTime());

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
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
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
}
