<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<title>Sale Stock</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="container" width="100">
			<center><h1>Transaction Order</h1></center>
			<ul class="nav nav-tabs">
				<li><a href="<?php echo site_url('product'); ?>">Products</a></li>
				<li><a href="<?php echo site_url('coupon'); ?>">My Coupon</a></li>
				<li><a href="<?php echo site_url('order'); ?>">My Order</a></li>
				<li class="active"><a href="<?php echo site_url('transaction'); ?>">My Transaction</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;" onclick="admin()">Admin</button>
		<br><br>
		<center>
		<table border="1" style="text-align: center;">
		<tr>
			<th>No. Transaction</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Adress</th>
			<th>Order</th>
			<th>Total</th>
			<th>Resi</th>
			<th>Shipping</th>
			<th>Status</th>
		</tr>
		<?php 
		if($transaction) {
			foreach($transaction as $t) {
				$temp = str_replace("%3C","<", $t{'OrderCus'});
				$temp1 = str_replace("%3E",">", $temp);
				echo "<tr>";
				echo "<td>".$t{'Id'}."</td>";
				echo "<td>".str_replace("%20"," ", $t{'Name'})."</td>";
				echo "<td>".$t{'Phone'}."</td>";
				echo "<td>".$t{'Email'}."</td>";
				echo "<td>".$t{'Address'}."</td>";
				echo "<td>".$temp1."</td>";
				echo "<td>".$t{'Total'}."</td>";
				if($t{'Resi'}) {
					echo "<td>".$t{'Resi'}."</td>";
				}
				else {
					echo "<td>Masukkan resi:<br><input type='text' id='resi' required><br><button type='button' value='".$t{'Id'}."' onclick='resi(this.value)'>Submit</button></td>";
				}
				if($t{'Status'} >= 4) {
					echo "<td>".$t{'Shipping'}."</td>";
				}
				else {
					echo "<td></td>";
				}
				if($t{'Status'} == 0) {
					echo "<td>Not completed</td>";
				}
				else if($t{'Status'} == 1) {
					echo "<td>Waiting Response</td>";
				}
				else if($t{'Status'} == 2) {
					echo "<td>Sending</td>";
				}
				else if($t{'Status'} == 3) {
						echo "<td>Cancel</td>";
				}
				else if($t{'Status'} == 4) {
						echo "<td>Konfirmasi paket sampai:<br><button type='button' value='".$t{'Id'}."' onclick='finish(this.value)'>Yes</button></td>";
				}
				else {
					echo "<td>Completed</td>";
				}
				echo "</tr>";
			}
		}
		?>
		</table>
		</center>
	</body>
</html>

<script type="text/javascript">
	function resi(value)
	{
		var e = document.getElementById("resi").value;
		window.location.href = "<?php echo base_url();?>index.php/transaction/updateResi/"+value+"/"+e;
	}
	
	function admin()
	{
		window.location.href = "<?php echo base_url();?>index.php/admin/";
	}
	
	function finish(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/transaction/finish/"+value;
	}
</script>