<?php 

include_once('LoadView.php');
include_once('config/accountDB.php');
include_once('config/transactionDB.php');
include_once('config/transactionLogDB.php');
session_start();
/**
* http://phpcoban.com/transaction-trong-mysql/
	http://nbmhoang.blogspot.com/2015/06/transaction-trong-php-va-mysql.html
*/
	class TransferController extends LoadView
	{
		
		public function transfer()
		{
			$conn = Database::connect();
			$getAccountTo =[];

			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				if (isset($_POST["action"])) {
					$action = $_POST["action"];
				}
				if (isset($_POST["txtAccount"])) {
					$accountTo = $_POST["txtAccount"];
				}
				if (isset($_POST["txtAmount"])) {
					$amount = $_POST["txtAmount"];
				}
				if (isset($_POST["txtContent"])) {
					$content = $_POST["txtContent"];
				}
			}
			if (isset($action)) {
				if ($action=="userTo") {
					$getAccountTo = AccountModel::getAccountByNumber($accountTo);
					$_SESSION['userTo']=$accountTo;
					$_SESSION['userToObject']=$getAccountTo;
				}
				if ($action=="Transfer") {
					try {
						$conn->beginTransaction();
						$balanceObject = TransferModel::getBalance($_SESSION['email']);
						$balance = $balanceObject->balance;
						$balance = (int)$balance;

						// Neu tai khoan nguoi nhan nhap vao dung va Neu so du lon hon so tien thi update 2 tai khoan
						if (!empty($_SESSION['userToObject'])) {
							if ($balance>=$amount) {
								if (isset($_SESSION['blanceError'])) {
									unset($_SESSION['blanceError']);
								}
								TransferModel::updateBalanceFrom($_SESSION['email'], $amount);
								TransferModel::updateBalanceTo($_SESSION['userTo'], $amount);
								
								$time=date('Y-m-d');
								$user= $_SESSION['accountObject'];
								$account = $user['account'];
								$account_number = $account->getNumber();
								// Tao log giao dich
								
							TransactionLogModel::setLog('Chuyển Tiền',$content,$amount,$time,$account_number);
							TransactionLogModel::setLog('Nhận Tiền',$content,$amount,$time,$_SESSION['userTo']);
							$conn->commit();
								echo "Chuyen tien thanh cong";
							} else {
								$_SESSION['blanceError'] = "Số dư không đủ";
							}
						} else {
							echo "Chuyen tien that bai";
						}
					} catch (PDOException $e) {
						$conn->rollBack();
					}
				}
			}
			return($this->LoadViews('transfer',$getAccountTo));
		}
	}
	?>