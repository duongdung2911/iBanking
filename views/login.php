<div id="login">
<h3>LOGIN</h3>
	<form action='#' method='POST' accept-charset="utf-8" >
		Email :
		<input type='text' name='txtEmail'/>
		Password :
		<input type='password' name='txtPassword'/>
		<input type="submit" name="action" value="login" class="btn btn-default" style="margin-top: 1.5em;">
		<?php
		if(isset($_SESSION['login_error'])){
			echo '<div class="alert alert-danger">'.$_SESSION["login_error"].'</div>';
		}
		?>
	</form>
</div>