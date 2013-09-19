<?php

namespace Equipamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Equipamento\Form\EquipamentoForm;
use Doctrine\ORM\EntityManager;
use Equipamento\Entity\Equipamento;

class EquipamentoController extends AbstractActionController
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
            'equipamentos' => $this->getEntityManager()->getRepository('Equipamento\Entity\Equipamento')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new EquipamentoForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $equipamento = new Equipamento();
            
            $form->setInputFilter($equipamento->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $equipamento->populate($form->getData()); 
                
                $this->getEntityManager()->persist($equipamento);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('equipamento'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('equipamento', array('action'=>'add'));
        } 
        
        $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);

        $form = new EquipamentoForm();
        $form->setBindOnValidate(false);
        $form->bind($equipamento);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('equipamento');
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
            return $this->redirect()->toRoute('equipamento');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);
                
                if ($equipamento) {
                    $this->getEntityManager()->remove($equipamento);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('equipamento');
        }

        return array(
            'id' => $id,
            'equipamento' => $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id)
        );
    }
}
