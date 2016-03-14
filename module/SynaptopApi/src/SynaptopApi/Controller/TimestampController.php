<?php


namespace SynaptopApi\Controller;
 
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
 
class TimestampController extends AbstractRestfulController
{
	public function indexAction()
	{
		$timeStamp = array('Timestamp' => time());
		if(isValidRequest($_GET['api_key'])) {
			echo json_encode($timeStamp);
		} else {
			$err = getError('Invalid api key.');
			echo $err;	
		}
		return new ViewModel();
	}
}

function isValidRequest($req)
{
	return $req == $GLOBALS['api_key'];	
}

function getError($msg)
{
	return json_encode(array('error' => true, 'message' => $msg));	
}

