<?php
namespace Sala\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Sala\Form\SalaForm;
use Doctrine\ORM\EntityManager;
use Sala\Entity\Sala;

use Classe;

use setting;

use Zend\Pdf;

class SalaController extends AbstractActionController
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
            'salas' => $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findAll() 
        ));
    }

    public function printAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        if (!$id) {
            $salas = $this->getEntityManager()->getRepository('Sala\Entity\Sala')->findAll();

            $xml = simplexml_load_file('C:\Users\Sadao\Documents\GitHub\relatorio\alunos\Alunos.jrxml'); //informe onde está seu arquivo jrxml
            
            $PHPJasperXML = new PHPJasperXML();

            $PHPJasperXML->debugsql = false;

            $PHPJasperXML->xml_dismantle($xml);

            $PHPJasperXML->connect('localhost','root','','cpds');

            $PHPJasperXML->transferDBtoArray('localhost','root','','cpds');

            $PHPJasperXML->outpage("I");

            return $this->redirect()->toRoute('sala');
        }

        else {
            $sala = $this->getEntityManager()->find('Sala\Entity\Sala', $id);
        }
    }

    public function viewAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('sala');
        }

        $sala = $this->getEntityManager()->find('Sala\Entity\Sala', $id);

        return new ViewModel(array(
            'sala' => $sala,
        ));
    }

    public function addAction()
    {
        $form = new SalaForm($this->getEntityManager());
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $sala = new Sala();
            
            $form->setInputFilter($sala->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) { 
                $sala->populate($form->getData()); 
                
                $local = $this->getEntityManager()->getRepository('Sala\Entity\Local')->findOneBy(array('idlocal' => $sala->getLocallocal()));
                $sala->setLocallocal($local);

                $this->getEntityManager()->persist($sala);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('sala'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        if (!$id) {
            return $this->redirect()->toRoute('sala', array('action'=>'add'));
        } 
        
        $sala = $this->getEntityManager()->find('Sala\Entity\Sala', $id);

        $form = new SalaForm($this->getEntityManager());
        $form->setBindOnValidate(false);
        $form->bind($sala);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $form->bindValues();

                $local = $this->getEntityManager()->getRepository('Sala\Entity\Local')->findOneBy(array('idlocal' => $form->getData()->getLocallocal()));
                $form->getData()->setLocallocal($local);

                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('sala');
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
            return $this->redirect()->toRoute('sala');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $sala = $this->getEntityManager()->find('Sala\Entity\Sala', $id);
                
                if ($sala) {
                    $this->getEntityManager()->remove($sala);
                    $this->getEntityManager()->flush();
                }
            }

            return $this->redirect()->toRoute('sala');
        }

        return array(
            'id' => $id,
            'sala' => $this->getEntityManager()->find('Sala\Entity\Sala', $id)
        );
    }
}
