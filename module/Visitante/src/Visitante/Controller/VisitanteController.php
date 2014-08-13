<?php
namespace Visitante\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Visitante\Form\VisitanteForm;
use Doctrine\ORM\EntityManager;
use Visitante\Entity\Visitante;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class VisitanteController extends AbstractActionController
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
        $visitantes = $this->getEntityManager()->getRepository('Visitante\Entity\Visitante')->findBy(array(),array('nomeVisitante' => 'ASC'));
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($visitantes));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }

    public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            $visitantes = $this->getEntityManager()->getRepository('Visitante\Entity\Visitante')->findBy(array(),array('nomeVisitante' => 'ASC'));
            return new ViewModel(array(
                'visitantes' => $visitantes
            ));
        }
        $visitante = $this->getEntityManager()->find('Visitante\Entity\Visitante', $id);
        return new ViewModel(array(
            'visitante' => $visitante
        ));
    }

    public function addAction()
    {
        $form = new VisitanteForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $visitante = new Visitante();
            
            $form->setInputFilter($visitante->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $visitante->populate($form->getData());

                $this->getEntityManager()->persist($visitante);
                $this->getEntityManager()->flush();
                // Redirect to list of albums
                return $this->redirect()->toRoute('visitante'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('visitante', array('action'=>'add'));
        } 
        
        $visitante = $this->getEntityManager()->find('Visitante\Entity\Visitante', $id);

        $form = new VisitanteForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($visitante);
        $form->get('submit')->setAttribute('label', 'Edit');

        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $this->getEntityManager()->persist($visitante);
                $this->getEntityManager()->flush();
                
                return $this->redirect()->toRoute('visitante');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('visitante');
        }

        $visitante = $this->getEntityManager()->find('Visitante\Entity\Visitante', $id);

        return new ViewModel(array(
            'visitante' => $visitante,
        ));
    }


    public function deleteAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('visitante');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $visitante = $this->getEntityManager()->find('Visitante\Entity\Visitante', $id);
                
                if ($visitante) {
                    $this->getEntityManager()->remove($visitante);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('visitante');
        }

        return array(
            'id' => $id,
            'visitante' => $this->getEntityManager()->find('Visitante\Entity\Visitante', $id)
        );
    }
}
