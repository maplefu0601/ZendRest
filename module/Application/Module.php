<?php
/**
 */

namespace Application;

use Application\Model\Transaction;
use Application\Model\TransactionTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

$GLOBALS['api_key'] = 'synaptop';

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

	public function getServiceConfig()
	 {
		 return array(
			 'factories' => array(
				 'Application\Model\TransactionTable' =>  function($sm) {
					 $tableGateway = $sm->get('TransactionTableGateway');
					 $table = new TransactionTable($tableGateway);
					 return $table;
				 },
				 'TransactionTableGateway' => function ($sm) {
					 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					 $resultSetPrototype = new ResultSet();
					 $resultSetPrototype->setArrayObjectPrototype(new Transaction());
					 
					 return new TableGateway('transaction', $dbAdapter, null, $resultSetPrototype);
				 },
			 ),
		 );
	 }
}

/*
final class FUtils
{
	public static function getInstance() {
		static $inst = null;
		if($inst === null) {
			$inst = new FUtil();	
		}
		return $inst;
	}

	private function __construct() {}
	
}

function isValidRequest($key)
{
	    return $key == $GLOBALS['api_key'];
}

function getError($msg)
{
	    return json_encode(array('error' => true, 'message' => $msg));
}
*/


