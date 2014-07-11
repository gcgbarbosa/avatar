<?php
namespace Equipamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Equipamento\Form\EquipamentoForm;
use Doctrine\ORM\EntityManager;
use Equipamento\Entity\Equipamento;
use Equipamento\Entity\Tombo;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Doctrine\ORM\EntityRepository;

class EquipamentoController extends AbstractActionController
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
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) { 
            $equipamentos = $this->getEntityManager()->getRepository('Equipamento\Entity\Equipamento')->findAll();
            $page = (int) $this->getEvent()->getRouteMatch()->getParam('page');
            $paginator = new Paginator(new ArrayAdapter($equipamentos));
            $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(8);
            return new ViewModel(array(
                'data' => $paginator,
                'page' => $page
            ));
        }
        $equipamentos = $this->findEquipamentoByTombo($id);
        return new ViewModel(array(
            'equipamentos' => $equipamentos, 
        ));
        
    }

public function relatorioAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            $equipamentos = $this->getEntityManager()->getRepository('Equipamento\Entity\Equipamento')->findAll();
            return new ViewModel(array(
                'equipamentos' => $equipamentos
            ));
        }
        $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);
        return new ViewModel(array(
            'equipamento' => $equipamento
        ));
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('equipamento');
        }

        $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);

        $equipamentos = $equipamento->getTombotombo()->toArray();
        $a_tombos = $this->getEntityManager()->getRepository('Equipamento\Entity\Tombo')->findAll();
        foreach($a_tombos as $k=>$a_p){
            foreach($equipamentos as $p){
                if($a_p == $p)
                    unset($a_tombos[$k]);
            }
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();

            if(isset($post->tombo_a)){

                $tombo = new Tombo();
                $tombo->setNumeroTombo($post->tombo_a);
                $tombo->setTomboequipamento($equipamento);
                $equipamento->addTombotombo($tombo);
                $this->getEntityManager()->persist($equipamento);
                $this->getEntityManager()->flush();
            }

            if(isset($post->tombo_r)){
                $tombo = $this->getEntityManager()->find('Equipamento\Entity\Tombo', $post->tombo_r);
                $equipamento->removeTombotombo($tombo);
                $this->getEntityManager()->remove($tombo);
                $this->getEntityManager()->persist($equipamento);
                $this->getEntityManager()->flush();
            }
            return $this->redirect()->toUrl("/equipamento/view/{$id}");    
        }

        return array(
            'id' => $id,
            'equipamento' => $equipamento,
            'tombos' => $a_tombos,
        );
    }

    public function findEquipamentoByTombo($tombo)
    {
        $query = $this->getEntityManager()->createQuery("SELECT u FROM
            Equipamento\Entity\Equipamento u WHERE u.ntombo LIKE :tombo");
        $query->setParameters(array('tombo' => '%' . $tombo . '%'));
        return $query->getResult();
    }

    public function addAction()
    {
        $form = new EquipamentoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $equipamento = new Equipamento();
            
            $form->setInputFilter($equipamento->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $equipamento->populate($form->getData()); 
                
                $query = $this->getEntityManager()->createQuery("SELECT u FROM
                    Equipamento\Entity\Equipamento u WHERE u.ntombo LIKE :tombo");
                $query->setParameters(array('tombo' => '%3.4%'));
                var_dump($query->getResult());exit;
                
                $jaTemEsteTombo = $this->getEntityManager()->getRepository('Equipamento\Entity\Equipamento')->findBy(array('ntombo' => $equipamento->getTombotombo()));
                var_dump($jaTemEsteTombo);exit;
                if (!isset($jaTemEsteTombo))
                    $jaTemEsteTombo = $this->getEntityManager()->getRepository('Equipamento\Entity\Tombo')->findBy(array('numeroTombo' => $equipamento->getTombotombo()));

                if ($jaTemEsteTombo) {
                    $mensagem = 'Equipamento já cadastrado';
                    return array(
                        'form' => $form,
                        'mensagem' => $mensagem,
                    );
                }
            
                $tipoequipamento = $this->getEntityManager()->getRepository('Equipamento\Entity\TipoEquipamento')->findOneBy(array('idtipoequipamento' => $equipamento->getTipoequipamentotipoequipamento()));
                $equipamento->setTipoequipamentotipoequipamento($tipoequipamento);

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $equipamento->getSalasala()));
                $equipamento->setSalasala($sala);

                $projeto = $this->getEntityManager()->getRepository('Projeto\Entity\Projeto')->findOneBy(array('idprojeto' => $equipamento->getProjetoprojeto()));
                $equipamento->setProjetoprojeto($projeto);


                $this->getEntityManager()->persist($equipamento);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('equipamento'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('equipamento', array('action'=>'add'));
        } 
        
        $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);

        $form = new EquipamentoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($equipamento);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $form->getData()->getSalasala()));
                $form->getData()->setSalasala($sala);

                $tipoequipamento = $this->getEntityManager()->getRepository('Equipamento\Entity\TipoEquipamento')->findOneBy(array('idtipoequipamento' => $form->getData()->getTipoequipamentotipoequipamento()));
                $form->getData()->setTipoequipamentotipoequipamento($tipoequipamento);

                $projeto = $this->getEntityManager()->getRepository('Projeto\Entity\Projeto')->findOneBy(array('idprojeto' => $form->getData()->getProjetoprojeto()));
                $form->getData()->setProjetoprojeto($projeto);

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('equipamento');
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
            return $this->redirect()->toRoute('equipamento');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $equipamento = $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id);
                $equipamentos = $equipamento->getTombotombo()->toArray();
                foreach($equipamentos as $e) {
                    $tombo = $this->getEntityManager()->find('Equipamento\Entity\Tombo', $e->getIdTombo());
                    $equipamento->removeTombotombo($tombo);
                    $this->getEntityManager()->remove($tombo);
                }
                if ($equipamento) {
                    $this->getEntityManager()->remove($equipamento);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('equipamento');
        }

        return array(
            'id' => $id,
            'equipamento' => $this->getEntityManager()->find('Equipamento\Entity\Equipamento', $id)
        );
    }
}
