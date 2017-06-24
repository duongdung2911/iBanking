<?php 
/**
* 
*/
class TransactionLogs 
{
	private $id;
	private $type;
	private $content;
	private $amount;
	private $time;
	private $account_number;
	function __construct($id,$type, $content, $amount, $time, $account_number)
	{
		$this->id = $id;
		$this->type = $type;
		$this->content = $content;
		$this->amount = $amount;
		$this->time = $time;
		$this->account_number = $account_number;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setType($type)
	{
		$this->type = $type;
	}
	public function getType()
	{
		return $this->type;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}
	public function getAmount()
	{
		return $this->amount;
	}
	public function setTime($time)
	{
		$this->time = $time;
	}
	public function getTime()
	{
		return $this->time;
	}
		public function setAccountNumber($account_number)
	{
		$this->account_number = $account_number;
	}
	public function getAccountNumber()
	{
		return $this->account_number;
	}
}

?>