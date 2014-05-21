<?php

namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\LocalForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\Local;
use Sala\Form\OcorrenciaForm;
use Sala\Entity\Ocorrencia;

class OcorrenciaController extends AbstractActionController
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
            'ocorrencias' => $this->getEntityManager()->getRepository('Sala\Entity\Ocorrencia')->findAll() 
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('ocorrencia');
        }

        $ocorrencia = $this->getEntityManager()->find('Sala\Entity\Ocorrencia', $id);

        return new ViewModel(array(
            'ocorrencia' => $ocorrencia,
        ));
    }

    public function addAction()
    {
        $form = new OcorrenciaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $ocorrencia = new Ocorrencia();
            
            $form->setInputFilter($ocorrencia->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $ocorrencia->populate($form->getData());

                $reservaSala = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findOneBy(array('idreservaSala' => $ocorrencia->getReservaSalaOcorrencia()));
                $ocorrencia->setReservaSalaOcorrencia($reservaSala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $ocorrencia->getFuncionarioOcorrencia()));
                $ocorrencia->setFuncionarioOcorrencia($funcionario);
                
                $this->getEntityManager()->persist($ocorrencia);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('ocorrencia'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('ocorrencia', array('action'=>'add'));
        } 
        
        $ocorrencia = $this->getEntityManager()->find('Sala\Entity\Ocorrencia', $id);

        $form = new OcorrenciaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($ocorrencia);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $reservaSala = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findOneBy(array('idreservaSala' => $ocorrencia->getReservaSalaOcorrencia()));
                $ocorrencia->setReservaSalaOcorrencia($reservaSala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $ocorrencia->getFuncionarioOcorrencia()));
                $ocorrencia->setFuncionarioOcorrencia($funcionario);

                $this->getEntityManager()->persist($ocorrencia);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('ocorrencia');
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
            return $this->redirect()->toRoute('ocorrencia');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $ocorrencia = $this->getEntityManager()->find('Sala\Entity\Ocorrencia', $id);
                
                if ($ocorrencia) {
                    $this->getEntityManager()->remove($ocorrencia);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('ocorrencia');
        }

        return array(
            'id' => $id,
            'ocorrencia' => $this->getEntityManager()->find('Sala\Entity\Ocorrencia', $id)
        );
    }
}
