<?php  
include_once('LoadView.php');
include_once('config/accountDB.php');
include_once('config/transactionLogDB.php');
/**
* 
*/
session_start();

class LogController extends LoadView
{

	// xu ly request o trang thong tin chi tiet tai khoan
	public function index()
	{
		if (isset($_SESSION['email'])) {
			$arrayDateLog=[];
			
			// Lay ve danh sách các Log giao dịch theo email dang nhap
			$listLog = TransactionLogModel::getLog($_SESSION['email']);

			// Lay tat ca thong tin tai khoan theo email dang nhap
			$account = AccountModel::getAccount($_SESSION['email']);

			
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				if (isset($_POST["action"])) {
					$action = $_POST["action"];
				}
				if (isset($_POST["txtStartDate"])) {
					$startDate = $_POST["txtStartDate"];
				}
				if (isset($_POST["txtEndDate"])) {
					$endDate = $_POST["txtEndDate"];
				}
			}

			// Nhan request tu nguoi dung
			if (isset($action)) {
				if ($action=='view') {

					// Chuyen doi ngay bat dau tu form
					$startDateCover = explode ( '/' , $startDate);
					$startYear = array_pop($startDateCover);
					array_unshift($startDateCover, $startYear);
					$startDateOk = implode('-', $startDateCover);

					// Chuyen doi ngay ket thuc tu form
					$endDateCover = explode ( '/' , $endDate);
					$endYear = array_pop($endDateCover);
					array_unshift($endDateCover, $endYear);
					$endDateOk = implode('-', $endDateCover);
					
					$arrayLogOk = array();

					// Lay ra danh sach ngay 
					for ($i=0; $i < count($listLog) ; $i++) { 
						$dateLog = $listLog[$i]->getTime(); 
						if (strtotime($startDateOk) <= strtotime($dateLog) && strtotime($dateLog) <= strtotime($endDateOk)) {
							// true -> day vao mang arrayLogOk
							array_unshift($arrayLogOk,$listLog[$i]);
						}
					}

					$arrayDetails = array('account' =>$account,'log'=>$arrayLogOk);
					$_SESSION['accountObject']=$arrayDetails;
					header("location:LogPage.php");
				}
			}
			return($this->LoadViews('index', $account));
		} else {
			echo "<h1 style='margin-top: 6em; text-align: center'>Bạn chưa đăng nhập!</h1>
			<button type='button' style='margin-left: 46em'>
				<a href='loginPage.php' style='padding: 2em'>Login</a>
			</button>";
		}
	}

	// chuyen huong sang trang chi tiet Log
	public function Log()
	{
		$this->LoadViews('detailsLog', $_SESSION['accountObject']);
	}
}
?>