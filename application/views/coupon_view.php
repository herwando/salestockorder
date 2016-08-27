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
		<div id="container" width="50px">
			<center><h1>Transaction Order</h1></center>
			<ul class="nav nav-tabs">
				<li><a href="<?php echo site_url('product'); ?>">Products</a></li>
				<li class="active"><a href="<?php echo site_url('coupon'); ?>">My Coupon</a></li>
				<li><a href="#">My Order</a></li>
				<li><a href="#">My Transaction</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;">Admin</button>
		<center>
		<table>
		<?php 
		if($coupon) {
			foreach($coupon as $c) {
				echo "<tr>";
				echo "<td><img src='". base_url() ."images/".$c{'Picture'}."' height='150' width='300' /></td>";
				echo "<td><b>".$c{'Name'}."</b><br>";
				echo "Masa berlaku : ".$c{'Startdate'}." sampai ".$c{'Finishdate'}."<br>";
				if($c{'Nominal'} > 0) {
					echo "Nominal : Rp. ".$c{'Nominal'}.",- <br>";
				}
				else {
					echo "Discount : ".$c{'Discount'}."% <br>";
				}
				echo "Total : ".$c{'Total'}."<br>";
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
		</table>
		</center>
	</body>
</html>