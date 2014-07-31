<?php

namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\ReservaSalaForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\ReservaSala;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class ReservaSalaController extends AbstractActionController
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
            'reservaSalas' => $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll() 
        ));*/
        $reservaSalas = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll();
        $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator(new ArrayAdapter($reservaSalas));
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
            return $this->redirect()->toRoute('reservasala');
        }

        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);

        return new ViewModel(array(
            'reservaSala' => $reservaSala,
        ));
    }

    function transformarData($time) {
        $hora = strtotime($time);
        $hora = new \DateTime(date('H:i:s', $hora));
        return $hora;
    }

    public function addAction()
    {
        $form = new ReservaSalaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $reservaSala = new ReservaSala();
            
            $form->setInputFilter($reservaSala->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $reservaSala->populate($form->getData());

                $reservaSala->setDataInicio($this->transformarData($reservaSala->getDataInicio()));
                $reservaSala->setDataFim($this->transformarData($reservaSala->getDataFim()));

                $data = explode("/", $reservaSala->getDataReserva());
                $data = $data['2']."-".$data['1']."-". $data['0'];
                
                $query = $this->getEntityManager()->createQuery("SELECT u FROM
                        Sala\Entity\ReservaSala u WHERE u.dataReserva LIKE :data");
                $query->setParameters(array('data' => '%' . $data . '%'));
                $dados = $query->getResult();

                foreach ($dados as $dado) {
                    $hora1 = date('H', strtotime($dado->getDataInicio()->format('H:i:s')));
                    $hora2 = date('H', strtotime($dado->getDataFim()->format('H:i:s')));
                    $hora3 = date('H', strtotime($reservaSala->getDataInicio()->format('H:i:s')));
                    if ($hora3 >= $hora1 && $hora3 < $hora2) {
                        $mensagem = 'Horário já ocupado.';
                        return array(
                            'form' => $form,
                            'mensagem' => $mensagem,
                        );
                    }
                }

                $reservaSala->setDataReserva(new \DateTime($data));

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservaSala->getSalaReserva()));
                $reservaSala->setSalaReserva($sala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservaSala->getFuncionarioReserva()));
                $reservaSala->setFuncionarioReserva($funcionario);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservaSala->getProfessorReserva()));
                $reservaSala->setProfessorReserva($professor);
                
                $this->getEntityManager()->persist($reservaSala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservasala'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('reservasala', array('action'=>'add'));
        } 
        
        $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);
        $form = new ReservaSalaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($reservaSala);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $reservaSala->getSalaReserva()));
                $reservaSala->setSalaReserva($sala);

                $funcionario = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findOneBy(array('idfuncionario' => $reservaSala->getFuncionarioReserva()));
                $reservaSala->setFuncionarioReserva($funcionario);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $reservaSala->getProfessorReserva()));
                $reservaSala->setProfessorReserva($professor);

                //SET DATA 
                $data = explode("/", $reservaSala->getDataReserva());
                $data = $data['0']."-".$data['1']."-". $data['2'];
                $reservaSala->setDataReserva(new \DateTime($data));
                //END SET DATA 

                $this->getEntityManager()->persist($reservaSala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('reservasala');
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
            return $this->redirect()->toRoute('reservasala');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $reservaSala = $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id);
                
                if ($reservaSala) {
                    $this->getEntityManager()->remove($reservaSala);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('reservasala');
        }

        return array(
            'id' => $id,
            'reservaSala' => $this->getEntityManager()->find('Sala\Entity\ReservaSala', $id)
        );
    }

    public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        $reservasSala = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll();
        $funcionarios = $this->getEntityManager()->getRepository('Funcionario\Entity\Funcionario')->findAll();
        $salas = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findAll();
        $professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll();

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();
            if ($post->selectfuncionario != '-1' || $post->selectsala != '-1' || $post->selectprofessor != '-1' || $post->data != "" || $post->objetivo != "") {
                if ($post->selectfuncionario != '-1') {
                    $data['funcionarioReserva'] = $post->selectfuncionario;
                }
                if ($post->selectsala != '-1') {
                    $data['salaReserva'] = $post->selectsala;
                }
                if ($post->selectprofessor != '-1') {
                    $data['professorReserva'] = $post->selectprofessor;
                }
                if (isset($data)) {
                    $reservasSala = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findBy($data);
                }
                if ($post->data != '') {
                    $date = explode("/", $post->data);
                    $date = $date['2']."-".$date['1']."-". $date['0'];
                    $query = $this->getEntityManager()->createQuery("SELECT u FROM
                        Sala\Entity\ReservaSala u WHERE u.dataReserva LIKE :data");
                    $query->setParameters(array('data' => '%' . $date . '%'));
                    $dados = $query->getResult();
                    foreach ($dados as $dado) {
                        foreach ($reservasSala as $key => $reserva) {
                            if ($reserva->getIdReservaSala() == $dado->getIdReservaSala()) {
                                $cont[] = $dado;
                            }
                        }
                    }
                    if (isset($cont)) {
                        $reservasSala = $cont;
                    }
                    else {
                        $reservasSala = array();
                    }
                }
                if ($post->objetivo != '') {
                    $query = $this->getEntityManager()->createQuery("SELECT u FROM
                        Sala\Entity\ReservaSala u WHERE u.objetivo LIKE :objetivo");
                    $query->setParameters(array('objetivo' => '%' . $post->objetivo . '%'));
                    $dados = $query->getResult();
                    foreach ($dados as $dado) {
                        foreach ($reservasSala as $key => $reserva) {
                            if ($reserva->getIdReservaSala() == $dado->getIdReservaSala()) {
                                $cont[] = $dado;
                            }
                        }
                    }
                    if (isset($cont)) {
                        $reservasSala = $cont;
                    }
                    else {
                        $reservasSala = array();
                    }
                }
            }
            else { 
                $reservasSala = $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll();
            }
            return new ViewModel(array(
                'reservasSala' => $reservasSala,
                'funcionarios' => $funcionarios,
                'salas' => $salas,
                'professores' => $professores
            ));
        }

        return new ViewModel(array(
            'reservasSala' => $this->getEntityManager()->getRepository('Sala\Entity\ReservaSala')->findAll(),
                'funcionarios' => $funcionarios,
                'salas' => $salas,
                'professores' => $professores
        ));
    }
}
