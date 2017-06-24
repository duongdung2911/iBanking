<?php 
$user = $data;
?>


	<div id="login" style="width: 30%">
		<h3>Thông tin tài khoản</h3>
		<table style="margin-top: 2em;">
			<tbody>
				<tr>
					<td>Số Tài Khoản: </td>
					<td><?=$user->getNumber()?></td>
				</tr>
				<tr>
					<td>Chủ Tài Khoản: </td>
					<td><?=$user->getFirtname().' '.$user->getLastname()?></td>
				</tr>
				<tr>
					<td>Số Dư: </td>
					<td><?=number_format($user->getBalance()).' USD'?></td>

				</tr>
			</tbody>
		</table>
		<p class="title" style="text margin-top: 2em;">Liệt kê giao dịch</p>

		<form action='#' method='POST' accept-charset="utf-8" >
		<a href="logoutPage.php" style="float: right;">LogOut</a>
			<table>
				<tbody>
					<tr>
						<td>Từ ngày:</td>
						<td>
							<input type="text" name="txtStartDate" id="timeCheckIn" class="form-control" />
						</td>
					</tr>
					<tr>
						<td>Đến ngày: </td>
						<td>
							<input type="text" name="txtEndDate" id="timeCheckOut" class="form-control" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="action" value="view" class="btn btn-default" style="margin-top: 1.5em;">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		
	</div>

