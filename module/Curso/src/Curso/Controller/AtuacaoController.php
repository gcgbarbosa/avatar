<?php
namespace Curso\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Curso\Form\AtuacaoForm;
use Doctrine\ORM\EntityManager;
use Curso\Entity\Curso;

class AtuacaoController extends AbstractActionController
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
            'atuacoes' => $this->getEntityManager()->getRepository('Curso\Entity\Atuacao')->findAll() 
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('atuacao');
        }

        $curso = $this->getEntityManager()->find('Curso\Entity\Atuacao', $id);

        return new ViewModel(array(
            'atuacao' => $atuacao,
        ));
    }

    public function addAction()
    {
        $form = new AtuacaoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $atuacao = new Atuacao();
            
            $form->setInputFilter($curso->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $atuacao->populate($form->getData()); 

                
                $this->getEntityManager()->persist($atuacao);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('atuacao'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('atuacao', array('action'=>'add'));
        } 
        
        $atuacao = $this->getEntityManager()->find('Curso\Entity\Atuacao', $id);

        $form = new AtuacaoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($atuacao);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

               

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('atuacao');
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
            return $this->redirect()->toRoute('atuacao');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $atuacao = $this->getEntityManager()->find('Curso\Entity\Atuacao', $id);
                
                if ($atuacao) {
                    $this->getEntityManager()->remove($atuacao);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('atuacao');
        }

        return array(
            'id' => $id,
            'atuacao' => $this->getEntityManager()->find('Curso\Entity\Atuacao', $id)
        );
    }
}
