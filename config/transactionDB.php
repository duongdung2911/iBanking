<?php 
include_once('library.php');
/**
* 
*/
class TransferModel
{

	// Lay so du cua tai khoan
	public static function getBalance($email)
	{
		$sql = "SELECT balance 
		FROM account 
		WHERE email='$email'";
		Library::setQuery($sql);
		$balance = Library::loadRow();
		if (empty($balance)) {
			return false;
		} else {
			return $balance;
		}
	}

	// giam so du trong tai khoan gui
	public static function updateBalanceFrom($email, $amount)
	{
		$sql = "UPDATE account
		SET balance = balance - $amount
		WHERE email = '$email'";
		Library::setQuery($sql);
		$result = Library::execSQL();
		return $result;
	}

	// tang so du trong tai khoan nhan
	public  function updateBalanceTo($account_number, $amount)
	{
		$sql = "UPDATE account
		SET balance = balance + $amount
		WHERE account_number = '$account_number'";
		Library::setQuery($sql);
		$result = Library::execSQL();
		return $result;
	}
}

?>