namespace Application\Model;

class Transaction
{
	public $id;
	public $user_id;
	public $product_id;
	public $amount;

	public function exchangeArray($data)
    {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
         $this->product_id  = (!empty($data['product_id'])) ? $data['product_id'] : null;
         $this->amount  = (!empty($data['amount'])) ? $data['amount'] : null;
    }

}
