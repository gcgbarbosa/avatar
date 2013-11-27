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
            'reservasalas' => $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new ReservaSalaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $reservasala = new ReservaSala();
            
            $form->setInputFilter($reservasala->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $reservasala->populate($form->getData());

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservasala->getSalasala()));
                $reservasala->setSalasala($sala);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservasala->getProfessorprofessor()));
                $reservasala->setProfessorprofessor($professor);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservasala->getFuncionariofuncionario()));
                $reservasala->setFuncionariofuncionario($funcionario);
                
                $data = explode("/", $reservasala->getDataInicio());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservasala->setDatainicio(new \DateTime($data));

                $data = explode("/", $reservasala->getDataFim());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservasala->setDatafim(new \DateTime($data));

                $this->getEntityManager()->persist($reservasala);
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
        
        $reservasala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);

        $form = new ReservaSalaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($reservasala);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservasala->getSalasala()));
                $reservasala->setSalasala($sala);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservasala->getProfessorprofessor()));
                $reservasala->setProfessorprofessor($professor);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservasala->getFuncionariofuncionario()));
                $reservasala->setFuncionariofuncionario($funcionario);

                $data = explode("/", $reservasala->getDatainicio());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservasala->setDatainicio(new \DateTime($data));

                $data = explode("/", $reservasala->getDatafim());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservasala->setDatafim(new \DateTime($data));

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
                $reservasala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);
                
                if ($reservasala) {
                    $this->getEntityManager()->remove($reservasala);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('reservasala');
        }

        return array(
            'id' => $id,
            'reservasala' => $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id)
        );
    }
}
