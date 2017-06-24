<?php 
$user= $_SESSION['accountObject'];
$account = $user['account'];
$log = $user['log'];
$userTo = $data;
?>


<div id="login" style="width: 35%">
	<h3 style='margin-bottom: 2em'>Giao dịch chuyển khoản</h3>
	<form action='#' method='POST' accept-charset="utf-8" >
		<table>
			<tbody>
				<tr>
					<td style="width: 20em">Tài khoản chuyển: </td>
					<td>
						<?=$account->getNumber()?>
					</td>
				</tr>
				<tr>
					<td>Số dư: </td>
					<td>
						<?=number_format($account->getBalance()).' USD'?>
					</td>
				</tr>
				<tr>
					<td>Tài khoản nhận: </td>
					<td>
						<form action="#" method="POST" accept-charset="utf-8">
							<input type="hidden" value="userTo" name="action">
							<input type="text" name="txtAccount" value="" class="btn btn-default" style="width: 10em">
							<input type="submit" value="OK" class="btn btn-default">
						</form>
					</td>
				</tr>
				<tr>
					<td>Chủ tài khoản: </td>
					<td>
						<?php 
						if (!empty($userTo)) {
							echo ($userTo->getFirtname().' '.$userTo->getLastname());
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Số tiền: </td>
					<td>
						<input type="text" name="txtAmount" value="" class="btn btn-default" style="width: 15em">
					</td>
				</tr>
				<tr>
					<td>Nội dung: </td>
					<td>
						<input type="text" name="txtContent" value="" class="btn btn-default" style="width: 15em">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="action" value="Transfer" class="btn btn-default" style="margin-top: 1.5em;">
					</td>
				</tr>
			</tbody>
		</table>
		<?php
		if(isset($_SESSION['blanceError'])){
			echo '<div class="alert alert-danger">'.$_SESSION['blanceError'].'</div>';
		}
		?>
	</form>
	<a href="indexPage.php" style="float: left;">Back</a>
	<a href="logoutPage.php" style="float: right;">LogOut</a>
</div>

