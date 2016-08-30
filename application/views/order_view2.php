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
		<button id="totalbayar" value="<?php echo $total; ?>" style="display:none;"></button>
		<button id="ordercus" value="<?php echo $ordercus; ?>" style="display:none;"></button>
		<button type='button' style="float: right;">Admin</button>
		<form  method="post" action="javascript:myFunction()">
			Name: <input type="text" id="name" required><br>
			Phone: <input type="tel" id="phone" required><br>
			E-mail: <input type="email" id="email" required><br>
			Address: <input type="text" id="address" required><br>
			<input name="Submit"  type="submit">
		</form>
	</body>
</html>

<script>
function myFunction() {
    var name = document.getElementById("name").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
	var address = document.getElementById("address").value;
	var total = document.getElementById("totalbayar").value;
	var ordercus = document.getElementById("ordercus").value;
	window.location.href = "<?php echo base_url();?>index.php/order/deleteCouponProduct/"+name+"/"+phone+"/"+email+"/"+address+"/"+total+"/"+ordercus;
}
</script>
