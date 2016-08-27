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
				<li class="active"><a href="<?php echo site_url('product'); ?>">Products</a></li>
				<li><a href="<?php echo site_url('coupon'); ?>">My Coupon</a></li>
				<li><a href="#">My Order</a></li>
				<li><a href="#">My Transaction</a></li>
			</ul>
		</div>
		<button type='button' style="float: right;">Admin</button>
		<center>
		<table>
		<?php 
		if($product) {
			foreach($product as $p) {
				if(($p{'Id'} % 2) == 1) {
					echo "<tr>";
				}
				echo "<td><img src='". base_url() ."images/".$p{'Picture'}."' height='150' width='150' /></td>";
				echo "<td><b>".$p{'Name'}."</b><br>";
				echo "Price : Rp. ".$p{'Price'}.",- <br>";
				echo "Rating : <img src='". base_url() ."images/".$p{'Rating'}."' height='25' width='120' /><br>";
				echo "Stock : ".$p{'Stock'}."<br>";
				if($p{'Stock'} > 0) {
					echo "<button type='button' value='".$p{'Id'}."' onclick='deleteProduct(this.value)'>Order</button><br>";
				}
				echo "</td>";
				if(($p{'Id'} % 2) == 0) {
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
	function deleteProduct(value)
	{
		window.location.href = "<?php echo base_url();?>index.php/product/order/"+value;
	}
</script>