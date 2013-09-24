<?php
namespace Equipamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Equipamento\Form\TipoEquipamentoForm;
use Doctrine\ORM\EntityManager;
use Equipamento\Entity\TipoEquipamento;

class TipoEquipamentoController extends AbstractActionController
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
            'tipoequipamentos' => $this->getEntityManager()->getRepository('Equipamento\Entity\TipoEquipamento')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new TipoEquipamentoForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $tipoequipamento = new TipoEquipamento();
            
            $form->setInputFilter($tipoequipamento->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $tipoequipamento->populate($form->getData()); 
                
                $this->getEntityManager()->persist($tipoequipamento);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('tipoequipamento'); 
            }
        }

        return array('form' => $form);
    }


    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('tipoequipamento', array('action'=>'add'));
        } 
        
        $tipoequipamento = $this->getEntityManager()->find('Equipamento\Entity\TipoEquipamento', $id);

        $form = new TipoEquipamentoForm();
        $form->setBindOnValidate(false);
        $form->bind($tipoequipamento);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('tipoequipamento');
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
            return $this->redirect()->toRoute('tipoequipamento');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $tipoequipamento = $this->getEntityManager()->find('Equipamento\Entity\TipoEquipamento', $id);
                
                if ($tipoequipamento) {
                    $this->getEntityManager()->remove($tipoequipamento);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('tipoequipamento');
        }

        return array(
            'id' => $id,
            'tipoequipamento' => $this->getEntityManager()->find('Equipamento\Entity\TipoEquipamento', $id)
        );
    }
}
