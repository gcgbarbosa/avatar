<?php
namespace Busca\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\View\Model\ViewModel;

class BuscaController extends AbstractActionController
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
            $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
            if (!$id) {

            }
            $alunos = $this->buscarAluno($id);
            $visitantes = $this->buscarVisitante($id);
            $controles = $this->buscarControle($id);
            if (empty($alunos))
                $alunos = array();
            if (empty($visitantes))
                $visitantes = array();
            if (empty($controles))
                $controles = array();
            return new ViewModel(array(
                'termo' => $post->busca,
                'alunos' => $alunos,
                'visitantes' => $visitantes,
                'controles' => $controles,
            ));
        ));
    }

    function buscarAluno($dados) {
        $query = $this->getEntityManager()->createQuery(
            "SELECT u 
            FROM Aluno\Entity\Aluno u 
            WHERE u.nomealuno LIKE :dados 
            OR u.emailaluno LIKE :dados
            OR u.telefonealuno LIKE :dados
            OR u.matriculaaluno LIKE :dados");
        $query->setParameters(array('dados' => '%' . $dados . '%'));
        return $query->getResult();
    }

    function buscarVisitante($dados) {
        $query = $this->getEntityManager()->createQuery(
            "SELECT u 
            FROM Visitante\Entity\Visitante u 
            WHERE u.nomeVisitante LIKE :dados 
            OR u.profissaoVisitante LIKE :dados
            OR u.instituicaoVisitante LIKE :dados
            OR u.objetivoVisitante LIKE :dados");
        $query->setParameters(array('dados' => '%' . $dados . '%'));
        return $query->getResult();
    }

    function buscarControle($dados) {
        $query = $this->getEntityManager()->createQuery(
            "SELECT u 
            FROM Controle\Entity\Controle u 
            WHERE u.dataEntradaControle LIKE :dados 
            OR u.dataSaidaControle LIKE :dados
            OR u.objetivoControle LIKE :dados");
        $query->setParameters(array('dados' => '%' . $dados . '%'));
        return $query->getResult();
    }

    public function buscaAction() {

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();
            if ($post->busca != '') {
                $alunos = $this->buscarAluno($post->busca);
                $visitantes = $this->buscarVisitante($post->busca);
                $controles = $this->buscarControle($post->busca);
                if (empty($alunos))
                    $alunos = array();
                if (empty($visitantes))
                    $visitantes = array();
                if (empty($controles))
                    $controles = array();
                return new ViewModel(array(
                    'termo' => $post->busca,
                    'alunos' => $alunos,
                    'visitantes' => $visitantes,
                    'controles' => $controles,
                ));
            }
        }
    }

}
