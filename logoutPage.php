<?php 
include('controller/AccountController.php');
$logoutPage = new AccountController();
$logoutPage->logout();
?>