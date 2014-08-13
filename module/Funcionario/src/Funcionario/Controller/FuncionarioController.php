<?php

namespace Funcionario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Funcionario\Form\FuncionarioForm;
use Doctrine\ORM\EntityManager;
use Funcionario\Entity\Funcionario;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class FuncionarioController extends AbstractActionController
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
            'funcionarios' => $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findAll() 
        ));*/
        $funcionarios = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findBy(array(),array('nomefuncionario' => 'ASC'));
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($funcionarios));
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
            return $this->redirect()->toRoute('funcionario');
        }

        $funcionario = $this->getEntityManager()->find('Funcionario\Entity\Funcionario', $id);

        return new ViewModel(array(
            'funcionario' => $funcionario,
        ));
    }


    public function relatorioindividualAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('funcionario', array('action'=>'index'));
        }
        $funcionario = $this->getEntityManager()->find('Funcionario\Entity\Funcionario', $id);
        //$projetos = $professor->getProjetoprojeto()->toArray();
    //    $controle = $this->getEntityManager()->getRepository('Controle\Entity\Controle')->findBy(array('alunoControle' => $id));
        return new ViewModel(array(
            'funcionario' => $funcionario,
          //  'projetos' => $projetos,
           // 'controle' => $controle,
        ));
    }


    public function addAction()
    {
        $form = new FuncionarioForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $funcionario = new Funcionario();
            
            $form->setInputFilter($funcionario->getInputFilter());
            $form->setData($request->getPost());
           // var_dump($form->isValid());exit;
            if ($form->isValid()) { 
                $funcionario->populate($form->getData()); 
                //SET DATA NASC
                $data = explode("/", $funcionario->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $funcionario->setDatanasc(new \DateTime($data));

                $data = explode("/", $funcionario->getDataAdmissao());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $funcionario->setDataAdmissao(new \DateTime($data));
                //END SET DATA NASC
                //SET BOLSISTA
                
                $this->getEntityManager()->persist($funcionario);
                $this->getEntityManager()->flush();

                // Redirect to list of funcionarios
                return $this->redirect()->toRoute('funcionario'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('funcionario', array('action'=>'add'));
        } 
        
        $funcionario = $this->getEntityManager()->find('Funcionario\Entity\Funcionario', $id);
        //$funcionario->setDatanasc(new \DateTime());

        $form = new FuncionarioForm();
        $form->setBindOnValidate(false);
        $form->bind($funcionario);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                 //SET DATA NASC
                $data = explode("/", $form->getData()->getDataNasc());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $form->getData()->setDatanasc(new \DateTime($data));

                $data = explode("/", $funcionario->getDataAdmissao());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $funcionario->setDataAdmissao(new \DateTime($data));
                //END SET DATA NASC
                $this->getEntityManager()->flush();

                // Redirect to list of funcionarios
                return $this->redirect()->toRoute('funcionario');
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
            return $this->redirect()->toRoute('funcionario');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $funcionario = $this->getEntityManager()->find('Funcionario\Entity\Funcionario', $id);
                
                if ($funcionario) {
                    $this->getEntityManager()->remove($funcionario);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('funcionario');
        }

        return array(
            'id' => $id,
            'funcionario' => $this->getEntityManager()->find('Funcionario\Entity\Funcionario', $id)
        );
    }
}
