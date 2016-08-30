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
				<li class="active"><a href="<?php echo site_url('admin'); ?>">Administrator</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;" onclick="customer()">Customer</button>
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
			<th>Konfirmasi Pembayaran</th>
			<th>Shipping</th>
			<th>Status</th>
		</tr>
		<?php 
		if($admin) {
			foreach($admin as $t) {
				if($t{'Pembayaran'}) {
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
					echo "<td>".$t{'Pembayaran'}."</td>";
					if($t{'Status'} == 2) {
						if($shipping) {
							echo "<td><select id='shipping'>";
							foreach($shipping as $s) {
								echo "<option value='".$s{'Name'}."'>".$s{'Name'}."</option>";
							}
							echo "</select>";
							echo "<button value='".$t{'Id'}."'onclick='pilih(this.value)'>Pilih</button></td>";
						}
					}
					else if($t{'Status'} >= 4) {
						echo "<td>".$t{'Shipping'}."</td>";
					}
					else {
						echo "<td></td>";
					}
					if($t{'Status'} == 0) {
						echo "<td>Not completed</td>";
					}
					if($t{'Status'} == 1) {
						echo "<td>Verify : <button type='button' value='".$t{'Id'}."' onclick='yes(this.value)'>Yes</button><button type='button' value='".$t{'Id'}."' onclick='no(this.value)'>No</button></td>";
					}
					if($t{'Status'} == 2) {
						echo "<td>Valid</td>";
					}
					if($t{'Status'} == 3) {
						echo "<td>Cancel</td>";
					}
					if($t{'Status'} == 4) {
						echo "<td>Waiting confirmation</td>";
					}
					if($t{'Status'} == 5) {
						echo "<td>Completed</td>";
					}
					echo "</tr>";
				}
			}
		}
		?>
		</table>
		</center>
	</body>
</html>

<script type="text/javascript">
	function customer()
	{
		window.location.href = "<?php echo base_url();?>index.php/product/";
	}
	
	function no(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/admin/cancel/"+value;
	}
	
	function yes(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/admin/valid/"+value;
	}
	
	function pilih(value)
	{
		var e = document.getElementById("shipping");
		var shipping = e.options[e.selectedIndex].value;
		window.location.href = "<?php echo base_url();?>index.php/admin/selectShipping/"+value+"/"+shipping;
	}
</script>