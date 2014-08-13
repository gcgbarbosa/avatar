<?php

namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\LocalForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\Local;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class LocalController extends AbstractActionController
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
            'locais' => $this->getEntityManager()->getRepository('Sala\Entity\Local')->findAll() 
        ));*/
        $locais = $this->getEntityManager()->getRepository('Sala\Entity\Local')->findBy(array(),array('nomelocal' => 'ASC'));
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($locais));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('local');
        }

        $local = $this->getEntityManager()->find('Sala\Entity\Local', $id);

        return new ViewModel(array(
            'local' => $local,
        ));
    }

    public function addAction()
    {
        $form = new LocalForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $local = new Local();
            
            $form->setInputFilter($local->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $local->populate($form->getData()); 
                
                $this->getEntityManager()->persist($local);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('local'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('local', array('action'=>'add'));
        } 
        
        $local = $this->getEntityManager()->find('Sala\Entity\Local', $id);

        $form = new LocalForm();
        $form->setBindOnValidate(false);
        $form->bind($local);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('local');
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
            return $this->redirect()->toRoute('local');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $local = $this->getEntityManager()->find('Sala\Entity\Local', $id);
                
                if ($local) {
                    $this->getEntityManager()->remove($local);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('local');
        }

        return array(
            'id' => $id,
            'local' => $this->getEntityManager()->find('Sala\Entity\Local', $id)
        );
    }
}
