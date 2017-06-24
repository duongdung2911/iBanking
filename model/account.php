<?php 
/**
* 
*/
class Account
{
	private $id;
	private $number;
	private $firtname;
	private $lastname;
	private $email;
	private $phone;
	private $address;
	private $balance;
	private $password;
	private $transactionLogs;
	function __construct($id,$number,$firtname,$lastname,$email,$phone,$address,$balance,$password)
	{
		$this->id = $id;
		$this->number = $number;
		$this->firtname = $firtname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->phone = $phone;
		$this->address = $address;
		$this->balance = $balance;
		$this->password = $password;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setNumber($number)
	{
		$this->number = $number;
	}
	public function getNumber()
	{
		return $this->number;
	}
	public function setFirtname($firtname)
	{
		$this->firtname = $firtname;
	}
	public function getFirtname()
	{
		return $this->firtname;
	}
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	public function getLastname()
	{
		return $this->lastname;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setAddress($address)
	{
		$this->address = $address;
	}
	public function getAddress()
	{
		return $this->address;
	}
	public function setBalance($balance)
	{
		$this->balance = $balance;
	}
	public function getBalance()
	{
		return $this->balance;
	}
	public function setTransactionLogs($transactionLogs)
	{
		$this->transactionLogs = $transactionLogs;
	}
	public function getTransactionLogs()
	{
		return $this->transactionLogs;
	}
}

?>