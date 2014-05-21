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
            return $this->redirect()->toRoute('reservasala');
        }

        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);

        return new ViewModel(array(
            'reservaSala' => $reservaSala,
        ));
    }

    public function addAction()
    {
        $form = new ReservaSalaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $reservaSala = new ReservaSala();
            
            $form->setInputFilter($reservaSala->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $reservaSala->populate($form->getData());

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservaSala->getSalaReserva()));
                $reservaSala->setSalaReserva($sala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservaSala->getFuncionarioReserva()));
                $reservaSala->setFuncionarioReserva($funcionario);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservaSala->getProfessorReserva()));
                $reservaSala->setProfessorReserva($professor);

                //SET DATA 
                $data = explode("/", $reservaSala->getDataReserva());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservaSala->setDataReserva(new \DateTime($data));
                //END SET DATA 
                
                $this->getEntityManager()->persist($reservaSala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservasala'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('reservasala', array('action'=>'add'));
        } 
        
        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);
        $form = new ReservaSalaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($reservaSala);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservaSala->getSalaReserva()));
                $reservaSala->setSalaReserva($sala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservaSala->getFuncionarioReserva()));
                $reservaSala->setFuncionarioReserva($funcionario);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservaSala->getProfessorReserva()));
                $reservaSala->setProfessorReserva($professor);

                //SET DATA 
                $data = explode("/", $reservaSala->getDataReserva());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservaSala->setDataReserva(new \DateTime($data));
                //END SET DATA 

                $this->getEntityManager()->persist($reservaSala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservasala');
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
            return $this->redirect()->toRoute('reservasala');
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

            return $this->redirect()->toRoute('reservasala');
        }

        return array(
            'id' => $id,
            'reservaSala' => $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id)
        );
    }
}
