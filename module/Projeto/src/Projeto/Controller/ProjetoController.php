<?php

namespace Projeto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Projeto\Form\ProjetoForm;
use Doctrine\ORM\EntityManager;
use Projeto\Entity\Projeto;

class ProjetoController extends AbstractActionController
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
            'projetos' => $this->getEntityManager()->getRepository('Projeto\Entity\Projeto')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new ProjetoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $projeto = new Projeto();


            
            $form->setInputFilter($projeto->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
             
                $projeto->populate($form->getData()); 
                
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $projeto->getProfessorcoordenador()));
                $projeto->setProfessorcoordenador($professor);
                //var_dump($professor);exit;
                $this->getEntityManager()->persist($projeto);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('projeto'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('projeto', array('action'=>'add'));
        } 
        
        $projeto = $this->getEntityManager()->find('Projeto\Entity\Projeto', $id);

        $form = new ProjetoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($projeto);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $projeto->getProfessorcoordenador()));
                $projeto->setProfessorcoordenador($professor);
                $this->getEntityManager()->persist($projeto);
                
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('projeto');
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
            return $this->redirect()->toRoute('projeto');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $projeto = $this->getEntityManager()->find('Projeto\Entity\Projeto', $id);
                
                if ($projeto) {
                    $this->getEntityManager()->remove($projeto);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('projeto');
        }

        return array(
            'id' => $id,
            'projeto' => $this->getEntityManager()->find('Projeto\Entity\Projeto', $id)
        );
    }
}
