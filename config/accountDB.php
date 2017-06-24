<?php 
include_once('library.php');
include_once('model/account.php');
/**
* 
*/
class AccountModel 
{
	// Kiem tra dang nhap
	public static function checkLogin($email, $md5_password)
	{
		$sql = "SELECT * FROM account WHERE email='$email'AND password='$md5_password'";
		Library::setQuery($sql);
		$user = Library::loadRow();
		if (empty($user)) {
			return false;
		} else {
			return true;
		}
	}

	// Lay toan bo thong tin tai khoan bang email
	public static function getAccount($email)
	{
		$sql = "SELECT * FROM account WHERE account.email = '$email'";
		Library::setQuery($sql);
		$row = Library::loadRow();
		$account = new Account(
			$row->account_id,
			$row->account_number,
			$row->firtname,
			$row->lastname,
			$row->email,
			$row->phone,
			$row->address,
			$row->balance,
			$row->password);
		if (empty($account)) {
			return ($account=NULL);
		} else {
			return $account;
		}
	}

	// Lay thong tin tai khoan bang so tai khoan
	public static function getAccountByNumber($account_number)
	{
		$sql = "SELECT * FROM account WHERE account_number = '$account_number'";
		Library::setQuery($sql);
		$row = Library::loadRow();
		if (!empty($row)) {
			$account = new Account(
				$row->account_id,
				$row->account_number,
				$row->firtname,
				$row->lastname,
				$row->email,
				$row->phone,
				$row->address,
				$row->balance,
				$row->password,
				$arrayName = array());
		}
		if (empty($account)) {
			return ($account=NULL);
		} else {
			return $account;
		}
	}
}

?>