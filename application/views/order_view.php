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
				<li class="active"><a href="<?php echo site_url('order'); ?>">My Order</a></li>
				<li><a href="<?php echo site_url('transaction'); ?>">My Transaction</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;" onclick="admin()">Admin</button>
		<center>
		<table border="1" style="text-align: center;">
		<tr>
			<th>Number Order</th>
			<th>Picture Product</th>
			<th>Name Product</th>
			<th>Total</th>
			<th>Price</th>
			<th>Operation</th>
		</tr>
		<?php 
		$ordercus = "";
		if($order) {
			foreach($order as $o) {
				$ordercus = $ordercus."".$o{'Name'}."(".$o{'Total'}.")<br>";
				echo "<tr>";
				echo "<td><b>".$o{'Id'}."</b><br>";
				echo "<td><img src='". base_url() ."images/".$o{'Picture'}."' height='150' width='150' /></td>";
				echo "<td><b>".$o{'Name'}."</b><br>";
				echo "<td>".$o{'Total'}."</td><br>";
				echo "<td>".$o{'Price'}."</td><br>";
				echo "<td><button value='".$o{'Id'}."' onclick='deleteOrder(this.value)'>Delete</button></td>";
				echo "</tr>";
			}
		}
		echo "<button id='ordercus' value='".$ordercus."' style='display:none;'></button>";
		?>
		</table>
		<center>
			<h5>Total Order : Rp. 
			<?php 
			$total = 0;
			if($price) {
				foreach($price as $p) {
					$total = $total + $p{'Price'};
				}
				echo $total.",-";
			} 
			else {
				echo "0,-";
			}
			
			echo "</h5><br>";
			echo "<h5>Apply Coupon:</h5>";
			$temp = 0;
			 if($coupon) {
				if($coupon->Nominal > 0) {
					$temp = $coupon->Nominal;
				}
				else {
					$temp = ($coupon->Discount * $total)/100;
				}
				echo "<table><tr><td><img src='". base_url() ."images/".$coupon->Picture."' height='100' width='150' /></td><td>".$coupon->Name."</td><td> Potongan : - Rp. ".$temp.",- </td>
				<td><button value='".$coupon->Id."' onclick='deleteCoupon(this.value)'>Delete</button></td></tr><table>";
			}
			else {
				echo "<a href=".site_url('coupon').">Pilih Coupon</a>";
			}
			$bayar = $total-$temp;
			if($bayar < 0) {
				$bayar = 0;
			}
			echo "<button id='totalbayar' value='".$bayar."' style='display:none;'></button>";
			echo "<h4>Total Pembayaran :  Rp. ".$bayar.",- </h4>";	
			if($order) {
				if($bank) {
					echo "<h5>Pembayaran via Transfer Bank : ";
					echo "<select id='totalorder'>";
					foreach($bank as $b) {
						echo "<option value='".$b{'Name'}."'>".$b{'Name'}."</option>";
					}
					echo "</select></h5>";
				}
				echo "<button onclick='orderPart2()'>Order</button>";
			}
			?>
		</center>
		</center>
	</body>
</html>




<script type="text/javascript">
	function deleteOrder(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/order/deleteOrder/"+value;
	}
	
	function deleteCoupon(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/order/deleteCoupon/"+value;
	}
	
	function orderPart2()
	{
		var total = document.getElementById("totalbayar").value;
		var ordercus = document.getElementById("ordercus").value;
		window.location.href = "<?php echo base_url();?>index.php/order/orderPart2/"+total+"/"+ordercus;
	}
	
	function admin()
	{
		window.location.href = "<?php echo base_url();?>index.php/admin/";
	}
</script>