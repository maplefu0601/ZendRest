<?php
/**
 * 
 *
 * 
 *@author	Raymond Fu 
 * 
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
		echo '999999999999999999999';
        return new ViewModel();
    }

	public function addAction()
	{
		
	}

    public function detailAction()
    {
        //echo 'getting user transactions';
		$id = $this->params()->fromRoute('id');
		//echo 'user_id='.$id;
        return new ViewModel(array(
            'transactions_user_id' => $id,//$this->getTransactionTable()->getTransactionByUser($id),
        ));
    }

	public function editAction()
	{
		
	}

	public function deleteAction()
	{
		
	}

    public function getTransactionTable()
    {
        var_dump('getTransactionTable...');
        if (!$this->transactionTable) {
            var_dump('getting');
            $sm = $this->getServiceLocator();
            
            $this->transactionTable = $sm->get('Application\Model\TransactionTable');
			echo 'end getting...';
        }

        var_dump($this->transactionTable);
        return $this->transactionTable;
    }


}

