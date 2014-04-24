<?php

namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\ReservaSalaForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\ReservaSala;

class ReservaSalaController extends AbstractActionController
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
            'reservaSalas' => $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll() 
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('reserva-sala');
        }

        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);

        return new ViewModel(array(
            'reservaSala' => $reservaSala,
        ));
    }

    public function addAction()
    {
        $form = new ReservaSalaForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $reservaSala = new ReservaSala();
            
            $form->setInputFilter($reservaSala->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $reservaSala->populate($form->getData()); 
                
                $this->getEntityManager()->persist($reservaSala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservaSala'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('reservaSala', array('action'=>'add'));
        } 
        
        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);

        $form = new ReservaSalaForm();
        $form->setBindOnValidate(false);
        $form->bind($reservaSala);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservaSala');
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
            return $this->redirect()->toRoute('reservaSala');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);
                
                if ($reservaSala) {
                    $this->getEntityManager()->remove($reservaSala);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('reservaSala');
        }

        return array(
            'id' => $id,
            'reservaSala' => $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id)
        );
    }
}
