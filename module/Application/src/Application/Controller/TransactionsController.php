<?php
/**
 */

namespace Application\Controller;

use Application\Model\Transaction;
use Application\Model\TransactionTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TransactionsController extends AbstractActionController
{
	protected $transactionTable;

    public function indexAction()
    {
		echo '88888999999999999999999999';
        return new ViewModel(array(
			//'transactions' => $this->getTransactionTable()->fetchAll(),
		));
    }

	public function addAction()
	{
		$trans = array(
			'id' => (int)$_POST['id'],
			'user_id' => (int)$_POST['user_id'],
			'product_id' => (int)$_POST['product_id'],
			'amount' =>(int)$_POST['amount'],
		);

        return new ViewModel(array(
			'transactions_data' => $trans,//$this->getTransactionTable()->saveTransaction($trans),
		));
		
	}

	public function detailAction()
	{
		//$id = $this->params()->fromRoute('id');	
		$id = $_GET['transaction_id']; 
        return new ViewModel(array(
			'transactions' => 'no record found',//$this->getTransactionTable()->getTransaction($id),
		));
	}

	public function userAction()
	{
		$id = $this->params()->fromRoute('user_id');	
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
			//var_dump($sm);
			try {
				echo $sm->has('Application\Model\TransactionTable');
				//$this->transactionTable = $sm->get('Application\Model\TransactionTable');
				$trans = $sm->get('Application\Model\TransactionTable');
				$this->transactionTable = $trans;
				echo 'end getting...';
			} catch(Exception $e) {
				echo 'error...'.$e->getMessage();	
			}
     	}

		echo 'before dump....';
		var_dump($this->transactionTable);
     	return $trans;
 	}


}


