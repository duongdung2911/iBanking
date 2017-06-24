<?php 
$account = $data['account'];
$transactionLog = $data['log'];
?>
<div class="views">
	<h1 style="margin-bottom: 1em">Danh sách giao dịch</h1>
	<a href="logoutPage.php" style="float: right;">LogOut</a>
	<a href="indexPage.php" style="float: left;">Back</a>
	<a href="transferPage.php" style="margin-left: 50%">Transfer</a>
	<table style="margin-top: 3em">
		<thead>
			<tr>
				<th>STT</th>
				<th>Loại giao dịch</th>
				<th>Số tiền</th>
				<th>Số dư</th>
				<th>Thời gian</th>
				<th>Nội dung</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i < count($transactionLog); $i++) { ?>
			<tr>
				<td><?=$i?></td>
				<td><?=$transactionLog[$i]->getType()?></td>
				<td><?=number_format($transactionLog[$i]->getAmount()).' USD'?></td>
				<td><?=$account->getBalance()?></td>
				<td><?=$transactionLog[$i]->getTime()?></td>
				<td><?=$transactionLog[$i]->getContent()?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>