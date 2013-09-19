<?php

namespace Professor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Professor\Form\DepartamentoForm;
use Doctrine\ORM\EntityManager;
use Professor\Entity\Departamento;

class DepartamentoController extends AbstractActionController
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
            'departamentos' => $this->getEntityManager()->getRepository('Professor\Entity\Departamento')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new DepartamentoForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $departamento = new Departamento();
            
            $form->setInputFilter($departamento->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $departamento->populate($form->getData()); 
                
                $this->getEntityManager()->persist($departamento);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('departamento'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('departamento', array('action'=>'add'));
        } 
        
        $departamento = $this->getEntityManager()->find('Professor\Entity\Departamento', $id);

        $form = new ProfessorForm();
        $form->setBindOnValidate(false);
        $form->bind($departamento);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('departamento');
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
            return $this->redirect()->toRoute('departamento');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $departamento = $this->getEntityManager()->find('Professor\Entity\Departamento', $id);
                
                if ($departamento) {
                    $this->getEntityManager()->remove($departamento);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('departamento');
        }

        return array(
            'id' => $id,
            'departamento' => $this->getEntityManager()->find('Professor\Entity\Departamento', $id)
        );
    }
}
