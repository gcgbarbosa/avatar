<?php

namespace Projeto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Projeto\Form\ProjetoForm;
use Doctrine\ORM\EntityManager;
use Projeto\Entity\Projeto;

class ProjetoController extends AbstractActionController
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
            'projetos' => $this->getEntityManager()->getRepository('Projeto\Entity\Projeto')->findAll() 
        ));
    }

    public function addAction()
    {
        $form = new ProjetoForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {

            $projeto = new Projeto();


            
            $form->setInputFilter($projeto->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
             
                $projeto->populate($form->getData());
                
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $projeto->getProfessorcoordenador()));
                $projeto->setProfessorcoordenador($professor);

                $grupoPesquisa = $this->getEntityManager()->getRepository('Projeto\Entity\GrupoPesquisa')->findOneBy(array('idprofessor' => $projeto->getGrupoPesquisaProjeto()));
                $projeto->setGrupoPesquisaProjeto($grupoPesquisa);

                if($projeto->getFinaciamento() == "true")
                    $projeto->setFinaciamento(true);
                else if($projeto->getFinaciamento() == "false")
                    $projeto->setFinaciamento(false);
                //var_dump($professor);exit;
                $this->getEntityManager()->persist($projeto);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('projeto'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('projeto', array('action'=>'add'));
        } 
        
        $projeto = $this->getEntityManager()->find('Projeto\Entity\Projeto', $id);

        $form = new ProjetoForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($projeto);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();
                
                $professor = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findOneBy(array('idprofessor' => $projeto->getProfessorcoordenador()));
                $projeto->setProfessorcoordenador($professor);

                $grupoPesquisa = $this->getEntityManager()->getRepository('Projeto\Entity\GrupoPesquisa')->findOneBy(array('idprofessor' => $projeto->getGrupoPesquisaProjeto()));
                $projeto->setGrupoPesquisaProjeto($grupoPesquisa);

                if($projeto->getFinaciamento() == "true")
                    $projeto->setFinaciamento(true);
                else if($projeto->getFinaciamento() == "false")
                    $projeto->setFinaciamento(false);

                $this->getEntityManager()->persist($projeto);
                
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('projeto');
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
            return $this->redirect()->toRoute('projeto');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $projeto = $this->getEntityManager()->find('Projeto\Entity\Projeto', $id);
                
                if ($projeto) {
                    $this->getEntityManager()->remove($projeto);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('projeto');
        }

        return array(
            'id' => $id,
            'projeto' => $this->getEntityManager()->find('Projeto\Entity\Projeto', $id)
        );
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('projeto');
        }

        $projeto = $this->getEntityManager()->find('Projeto\Entity\Projeto', $id);

        $professores = $projeto->getProfessorprofessor()->toArray();
        $a_professores = $this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll();
        foreach($a_professores as $k=>$a_p){
            foreach($professores as $p){
                if($a_p == $p)
                    unset($a_professores[$k]);
            }
        }
        $alunos = $projeto->getAlunoaluno()->toArray();
        $a_alunos = $this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll();
        foreach($a_alunos as $k=>$a_a){
            foreach($alunos as $a){
                if($a_a == $a)
                    unset($a_alunos[$k]);
            }
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $post = $request->getPost();

            //var_dump($post);exit;

            if(isset($post->professor_a)){
                $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $post->professor_a);
                $professor->addProjetoprojeto($projeto);
                $this->getEntityManager()->persist($professor);
                $this->getEntityManager()->flush();
            }

            if(isset($post->aluno_a)){
                $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $post->aluno_a);
                $aluno->addProjetoprojeto($projeto);
                $this->getEntityManager()->persist($aluno);
                $this->getEntityManager()->flush();
            }

            if(isset($post->professor_r)){
                $professor = $this->getEntityManager()->find('Professor\Entity\Professor', $post->professor_r);
                $professor->removeProjetoprojeto($projeto);
                $this->getEntityManager()->persist($professor);
                $this->getEntityManager()->flush();
            }

            if(isset($post->aluno_r)){
                $aluno = $this->getEntityManager()->find('Aluno\Entity\Aluno', $post->aluno_r);
                $aluno->removeProjetoprojeto($projeto);
                $this->getEntityManager()->persist($aluno);
                $this->getEntityManager()->flush();
            }
            return $this->redirect()->toUrl("/projeto/view/{$id}");    
        }

        return array(
            'id' => $id,
            'projeto' => $projeto,
            'professores' => $a_professores,//$this->getEntityManager()->getRepository('Professor\Entity\Professor')->findAll(),
            'alunos' => $a_alunos,//$this->getEntityManager()->getRepository('Aluno\Entity\Aluno')->findAll(),
        );
    }
}
