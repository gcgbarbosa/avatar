<?php

namespace Funcionario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Funcionario\Form\FrequenciaForm;
use Doctrine\ORM\EntityManager;
use Funcionario\Entity\Frequencia;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class FrequenciaController extends AbstractActionController
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
            'frequencias' => $this->getEntityManager()->getRepository('Funcionario\Entity\Frequencia')->findAll() 
        ));*/

        $frequencias = $this->getEntityManager()->getRepository('Funcionario\Entity\Frequencia')->findAll();
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($frequencias));
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
            return $this->redirect()->toRoute('frequencia');
        }

        $frequencia = $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id);

        return new ViewModel(array(
            'frequencia' => $frequencia,
        ));
    }

    public function addAction()
    {
        $form = new FrequenciaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $frequencia = new Frequencia();
            
            $form->setInputFilter($frequencia->getInputFilter());
            
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $frequencia->populate($form->getData()); 
                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $frequencia->getFuncionariofuncionario()));
                
                $frequencia->setFuncionariofuncionario($funcionario);

                $presentes = $this->getEntityManager()->getRepository('Funcionario\Entity\Frequencia')->findBy(array('statusFrequencia' => true));

                foreach ($presentes as $presente) {
                    if ($presente->getFuncionariofuncionario() == $frequencia->getFuncionariofuncionario()) {
                        $mensagem = 'Funcionário já está presente';
                        return array(
                            'form' => $form,
                            'mensagem' => $mensagem,
                        );
                    }
                }

                if ($this->flashMessenger()->hasErrorMessages()) {
                   
                }

                $frequencia->setHorarioentrada(new \DateTime(date('Y-m-d H:i:s')));
                $frequencia->setHorariosaida(NULL); 

                $frequencia->setStatusFrequencia(true);
                
                $this->getEntityManager()->persist($frequencia);
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('frequencia'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('frequencia', array('action'=>'add'));
        } 
        
        $frequencia = $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id);
        //$funcionario->setDatanasc(new \DateTime());

        $form = new FrequenciaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($frequencia);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $frequencia->getFuncionariofuncionario()));
                $frequencia->setFuncionariofuncionario($funcionario);

                //SET DATA 
                $data = explode("/", $frequencia->getDataFrequencia());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $frequencia->setDataFrequencia(new \DateTime($data));
                //END SET DATA

                $this->getEntityManager()->persist($frequencia);
                $this->getEntityManager()->flush();

                // Redirect to list of funcionarios
                return $this->redirect()->toRoute('frequencia');
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
            return $this->redirect()->toRoute('frequencia');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $frequencia = $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id);
                
                if ($frequencia) {
                    $this->getEntityManager()->remove($frequencia);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('frequencia');
        }

        return array(
            'id' => $id,
            'frequencia' => $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id)
        );
    }

    public function saidaAction() {

        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('frequencia');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $frequencia = $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id);
                
                if ($frequencia) {
                    $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $frequencia->getFuncionariofuncionario()));
                    $frequencia->setFuncionariofuncionario($funcionario);

                    $frequencia->setHorariosaida(new \DateTime(date('Y-m-d H:i:s')));
                    
                    $frequencia->setStatusFrequencia(false);

                    $this->getEntityManager()->persist($frequencia);
                    $this->getEntityManager()->flush();
                    
                    return $this->redirect()->toRoute('frequencia');
                }
            }

            return $this->redirect()->toRoute('frequencia');
        }

        return array(
            'id' => $id,
            'frequencia' => $this->getEntityManager()->find('Funcionario\Entity\Frequencia', $id)
        );
    }
}
