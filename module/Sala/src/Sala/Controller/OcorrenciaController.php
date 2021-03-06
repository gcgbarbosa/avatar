<?php

namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\LocalForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\Local;
use Sala\Form\OcorrenciaForm;
use Sala\Entity\Ocorrencia;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

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
        /*return new ViewModel(array(
            'ocorrencias' => $this->getEntityManager()->getRepository('Sala\Entity\Ocorrencia')->findAll() 
        ));*/
        $ocorrencias = $this->getEntityManager()->getRepository('Sala\Entity\Ocorrencia')->findAll();
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($ocorrencias));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
        return new ViewModel(array(
            'data' => $paginator,
            'page' => $page
        ));
    }


    public function relatorioAction(){
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        if(!$id){
            $ocorrencias = $this->getEntityManager()->getRepository('Sala\Entity\Ocorrencia')->findAll();
            $funcionarios = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findAll();
            $salas = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findAll();
            $em = $this->getEntityManager();
            $qb = $em->createQueryBuilder();
            //$qb = $em->createQuery('SELECT u.id FROM CmsUser u');
            //$ids = $query->getResult();
            //var_dump($ids);exit();
            $request = $this->getRequest();
            if ($request->isPost()) {
                $post = $request->getPost();

                if ($post->selectfuncio != '-1' || $post->selectsala != '-1' ) {
                    if ($post->selectfuncio != '-1') {
                        $data['funcionarioOcorrencia'] = $post->selectfuncio;
                    }
                    if ($post->selectsala != '-1') {
                        $data['reservaSalaOcorrencia'] = $post->selectsala;
                    }
                    if (isset($data)) {
                        $ocorrencias = $this->getEntityManager()->getRepository('Sala\Entity\Ocorrencia')->findBy($data);
                    }
                }
                return new ViewModel(array(
                    'ocorrencias' => $ocorrencias,
                    'funcionarios' => $funcionarios,
                    'salas' => $salas,
                ));
        }
        $ocorrencia = $this->getEntityManager()->find('Sala\Entity\Ocorrencia', $id);
        return new ViewModel(array(
            'ocorrencias' => $ocorrencias,
            'funcionarios' => $funcionarios,
            'salas' => $salas,
        ));
        }
    }

    public function viewAction(){
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
