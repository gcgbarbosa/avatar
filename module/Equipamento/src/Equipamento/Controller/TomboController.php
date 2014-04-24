<?php
namespace Equipamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Equipamento\Form\TomboForm;
use Doctrine\ORM\EntityManager;
use Equipamento\Entity\Tombo;

class TomboController extends AbstractActionController
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
            'tombos' => $this->getEntityManager()->getRepository('Equipamento\Entity\Tombo')->findAll() 
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('tombo');
        }

        $tombo = $this->getEntityManager()->find('Equipamento\Entity\Tombo', $id);

        return new ViewModel(array(
            'tombo' => $tombo,
        ));
    }

    public function addAction()
    {
        $form = new TomboForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $tombo = new Tombo();
            
            $form->setInputFilter($tombo->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $tombo->populate($form->getData()); 
                
                $this->getEntityManager()->persist($tombo);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('tombo'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('tombo', array('action'=>'add'));
        } 
        
        $tombo = $this->getEntityManager()->find('Equipamento\Entity\Tombo', $id);

        $form = new TomboForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($tombo);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('tombo');
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
            return $this->redirect()->toRoute('tombo');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $tombo = $this->getEntityManager()->find('Equipamento\Entity\Tombo', $id);
                
                if ($tombo) {
                    $this->getEntityManager()->remove($tombo);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('tombo');
        }

        return array(
            'id' => $id,
            'tombo' => $this->getEntityManager()->find('Equipamento\Entity\Tombo', $id)
        );
    }
}
