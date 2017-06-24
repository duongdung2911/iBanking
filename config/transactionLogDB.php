<?php 
include_once('library.php');
include_once('model/transactionLogs.php');
/**
* 
*/
class TransactionLogModel 
{

	// Lay ve thong tin giao dich theo email dang nhap
	public static function getLog($email)
	{
		$sql = "SELECT log.* FROM transaction_log log INNER JOIN account WHERE account.account_number = log.account_number AND account.email = '$email'";
		Library::setQuery($sql);
		$row = Library::loadAllRows();
		$listLog = [];
		for ($i=0; $i < count($row); $i++) { 
			$transactionLog = new TransactionLogs(
			$row[$i]->log_id,
			$row[$i]->type,
			$row[$i]->content,
			$row[$i]->amount,
			$row[$i]->time,
			$row[$i]->account_number);
			array_unshift($listLog, $transactionLog);
		}
		if (empty($listLog)) {
			return ($listLog=NULL);
		} else {
			return $listLog;
		}
	}

	// Ghi thong tin giao dich khi thuc hien chuyen tien
	public static function setLog($type, $content, $amount, $time, $account_number)
	{
		$sql = "INSERT INTO transaction_log(type, content, amount, time, account_number) VALUE (?,?,?,?,?)";
		Library::setQuery($sql);
		$result = Library::executeSQL(array($type, $content, $amount, $time, $account_number));
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
}

?>