<?php 
include_once('controller/AccountController.php');
$loginPage = new AccountController();
$loginPage->login();
?>