<?php

namespace Projeto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Projeto\Form\GrupoPesquisaForm;
use Doctrine\ORM\EntityManager;
use Projeto\Entity\GrupoPesquisa;

class GrupoPesquisaController extends AbstractActionController
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
            'grupoPesquisas' => $this->getEntityManager()->getRepository('Projeto\Entity\GrupoPesquisa')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new GrupoPesquisaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $grupoPesquisa = new GrupoPesquisa();

            $form->setInputFilter($grupoPesquisa->getInputFilter());
            $form->setData($request->getPost());
            var_dump($form->isValid());
            if ($form->isValid()) {
             
                $grupoPesquisa->populate($form->getData());
                
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $grupoPesquisa->getPesquisadorresponsavel()));
                $grupoPesquisa->setPesquisadorresponsavel($professor);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $grupoPesquisa->getCoordPesquisa()));
                $grupoPesquisa->setCoordPesquisa($professor);

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $grupoPesquisa->getSalasala()));
                $grupoPesquisa->setSalasala($sala);


                $this->getEntityManager()->persist($grupoPesquisa);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('grupopesquisa'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('grupopesquisa', array('action'=>'add'));
        } 
        
        $grupoPesquisa = $this->getEntityManager()->find('Projeto\Entity\GrupoPesquisa', $id);

        $form = new GrupoPesquisaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($grupoPesquisa);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $form->bindValues();
                
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $grupoPesquisa->getPesquisadorresponsavel()));
                $grupoPesquisa->setPesquisadorresponsavel($professor);

                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $grupoPesquisa->getCoordPesquisa()));
                $grupoPesquisa->setCoordPesquisa($professor);

                $sala = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findOneBy(array('idsala' => $grupoPesquisa->getSalasala()));
                $grupoPesquisa->setSalasala($sala);

                $this->getEntityManager()->persist($grupoPesquisa);
                
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('grupopesquisa');
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
            return $this->redirect()->toRoute('grupopesquisa');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $grupoPesquisa = $this->getEntityManager()->find('Projeto\Entity\GrupoPesquisa', $id);
                
                if ($grupoPesquisa) {
                    $this->getEntityManager()->remove($grupoPesquisa);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('grupopesquisa');
        }

        return array(
            'id' => $id,
            'grupoPesquisa' => $this->getEntityManager()->find('Projeto\Entity\GrupoPesquisa', $id)
        );
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('grupopesquisa');
        }

        $grupoPesquisa = $this->getEntityManager()->find('Projeto\Entity\GrupoPesquisa', $id);


        $atuacoes = $grupoPesquisa->getAreaarea()->toArray();
        $a_atuacoes = $this->getEntityManager()->getRepository('Curso\Entity\Atuacao')->findAll();
        foreach($a_atuacoes as $k=>$a_p){
            foreach($atuacoes as $p){
                if($a_p == $p)
                    unset($a_atuacoes[$k]);
            }
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();
            var_dump($post);exit;
            if(isset($post->atuacao_a)){

                $atuacao = $this->getEntityManager()->find('Curso\Entity\Atuacao', $post->atuacao_a);
                $atuacao->addAreaarea($grupoPesquisa);
                $this->getEntityManager()->persist($grupoPesquisa);
                $this->getEntityManager()->flush();
            }

            if(isset($post->atuacao_r)){
                $atuacao = $this->getEntityManager()->find('Curso\Entity\Atuacao', $post->atuacao_r);
                $atuacao->removeAreaarea($grupoPesquisa);
                $this->getEntityManager()->persist($atuacao);
                $this->getEntityManager()->flush();
            }
            return $this->redirect()->toUrl("/grupopesquisa/view/{$id}");    
        }
        return new ViewModel(array(
            'grupoPesquisa' => $grupoPesquisa,
            'atuacoes' => $a_atuacoes,//$this->getEntityManager()->getRepository('Curso\Entity\Atuacao')->findAll(),
        ));

    }
}
