<?php 
// session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>iBanking</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <link rel="stylesheet" href="public/css/my-css.css"> -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link href="public/css/bootstrap.min.css" rel="stylesheet" />
	<link href="public/css/datepicker.css" rel="stylesheet" />
	<style type="text/css">
		#login {
			border: 1px solid #333;
			border-radius: 5px;
			width: 30%;
			margin: 6em auto;
			padding: 0 2em 2em;
		}
		#login form {
			
			display: flex;
			flex-direction: column;
		}
		#login h3 {
			text-align: center;
			margin-top: 1em;
		}
		.title {
			font-weight: bold;
		}
		table {
			width: 100%;
		}
		.views {
			padding: 5em 10em;
		}
		.views h1{
			text-align: center;
		}
		.views form table tbody {
			width: 80%;
			display: flex;
			justify-content: center;
		}
	</style>
</head>
<body>

		<?php 
		include($view.'.php');
		?>

</body>
<script src="public/js/jquery-3.1.0.min.js"></script>
<script src="public/js/my-js.js"></script>
<script src="public/js/bootstrap-datepicker.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/bootstrap-datepicker.js"></script>
</html>