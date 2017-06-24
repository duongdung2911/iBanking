<?php 
session_start();
include_once('LoadView.php');
 
include_once('config/accountDB.php');

/**
* 
*/
class AccountController extends LoadView
{

	// xu ly request trang login
	public function login()
	{
		$action=NULL;
		$email=NULL;
		$password=NULL;

		if ($_SERVER["REQUEST_METHOD"]=="POST") {
			if (isset($_POST["action"])) {
				$action = $_POST["action"];
			}
			if (isset($_POST["txtEmail"])) {
				$email = $_POST["txtEmail"];
			}
			if (isset($_POST["txtPassword"])) {
				$password = $_POST["txtPassword"];
			}
		}

		// Kiem tra action tu nguoi dung
		if (isset($action)) {
			if ($action=='login') {
				$user = AccountModel::checkLogin($email, md5($password));
				if ($user) {
					$_SESSION['email']=$email;
					if (isset($_SESSION['login_error'])) {
						unset($_SESSION['login_error']);
					}
					header("location:indexPage.php");
				} else {
					$_SESSION['login_error']="Thông tin đăng nhập không chính xác. Vui lòng đăng nhập lại.";
				}
			}
		}
		return($this->LoadViews('login'));
	}


	// Xu ly request logout
	public function logout()
	{
		session_destroy();
		header("location:loginPage.php");
	}
}

?>