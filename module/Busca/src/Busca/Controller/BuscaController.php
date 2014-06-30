<?php
namespace Busca\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

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
        
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');

        if (!$id) {
            return new ViewModel(array());
        }

        $alunos = buscarAluno($id);
        return new ViewModel(array(
            'alunos' => $alunos,
        ));
    }

    function buscarAluno($nome) {
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'u')
           ->add('from', 'Aluno\Entity\Aluno u')
           ->add('where', 'u.nomeAluno = :nome')
           ->add('orderBy', 'u.name ASC');
           ->setParameter('nome', $nome);
        return $qb->getResult();
    }

}
