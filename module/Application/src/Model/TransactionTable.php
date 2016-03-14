

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class TransactionTable
{
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
		 var_dump('666666');
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }


     public function getTransactionById($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
     public function getTransactionByUser($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('user_id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function getTransaction($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveTransaction(Transaction $trans)
     {
         $data = array(
             'user_id' => $trans->user_id,
             'product_id'  => $trans->product_id,
			'amount' => $trans->amount,
         );

         $id = (int) $trans->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getTransaction($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception(' id does not exist');
             }
         }
     }

     public function deleteTransaction($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
