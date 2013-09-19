<?php

namespace Aluno\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Aluno\Form\AlunoForm;
use Doctrine\ORM\EntityManager;
use Aluno\Entity\Aluno;

class AlunoController extends AbstractActionController
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
            'alunos' => $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new AlunoForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $aluno = new Aluno();
            
            $form->setInputFilter($aluno->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {

                $aluno->populate($form->getData());

                $aluno->setDatanasc(new \DateTime());

                if($aluno->getBolsista() == "true")
                    $aluno->setBolsista(true);
                else if($aluno->getBolsista() == "false")
                    $aluno->setBolsista(false);
                //var_dump($request->getPost());exit;
                $this->getEntityManager()->persist($aluno);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('aluno'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('aluno', array('action'=>'add'));
        } 
        
        $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
        $aluno->setDatanasc(new \DateTime());

        $form = new AlunoForm();
        
        $form->setBindOnValidate(false);

        $form->bind($aluno);

        $form->get('submit')->setAttribute('label', 'Edit');

        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                if($form->getData()->getBolsista() == "true")
                    $form->getData()->setBolsista(true);
                else if($form->getData()->getBolsista() == "false")
                    $form->getData()->setBolsista(false);

                $form->getData()->setDatanasc(new \DateTime());
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('aluno');
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
            return $this->redirect()->toRoute('aluno');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $id);
                
                if ($aluno) {
                    $this->getEntityManager()->remove($aluno);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('aluno');
        }

        return array(
            'id' => $id,
            'aluno' => $this->getEntityManager()->find('Aluno\Entity\Aluno', $id)
        );
    }
}
