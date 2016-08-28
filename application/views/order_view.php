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
				<li><a href="#">My Transaction</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;">Admin</button>
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
		if($order) {
			foreach($order as $o) {
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
		?>
		</table>
		<center>
			<h4>Total : Rp. 
			<?php if($price) {
				$total = 0;
				foreach($price as $p) {
					$total = $total + $p{'Price'};
				}
				echo $total.",-";
			} 
			else {
				echo "0,-";
			}
			?>
			</h4>
		</center>
		</center>
	</body>
</html>

<script type="text/javascript">
	function deleteOrder(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/order/deleteOrder/"+value;
	}
</script>