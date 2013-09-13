<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;


class IndexController extends AbstractActionController
{
	/**             
	 * @var Doctrine\ORM\EntityManager
	 */                
	protected $em;

	/**
     * get entityManager
     *
     * @return EntityManager
     */
	public function getEntityManager()
	{
		if (null === $this->em) {
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;
	}

    public function indexAction()
    {
    	$em = $this->getEntityManager();


        return new ViewModel(array(
        	'message' => $this->flashMessenger()->getMessages(),

        ));
    }
}
