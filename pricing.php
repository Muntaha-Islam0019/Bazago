<?php
require 'config.php';
?>

<!doctype html>
<html>

<head>
	<title>BazaGO</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	<style>
		body {
			font-family: Arial;
		}

		* {
			box-sizing: border-box;
		}

		form.example input[type=text] {
			padding: 10px;
			font-size: 17px;
			border: 1px solid grey;
			margin-left: 30px;
			float: left;
			width: 80%;
			background: #f1f1f1;
		}

		form.example button {
			float: right;
			width: 15%;
			margin-right: 30px;
			padding: 10px;
			background: #2196F3;
			color: white;
			font-size: 17px;
			border: 1px solid grey;
			border-left: none;
			cursor: pointer;
		}

		form.example button:hover {
			background: #0b7dda;
		}

		form.example::after {
			content: "";
			clear: both;
			display: table;
		}
	</style>
</head>

<body>
	<h3><img src="Images/BazaGO logo.png" width="100" height="117" style="margin-left:15px"><i>Welcome to BazaGO</i></h3>

	<?php

	$q = "SELECT availability.item_name as N, price as MP, shop.shop_name as SN FROM availability, shop where availability.shop_id = shop.shop_id and price = (select min(price) from availability AS avl where avl.item_name = availability.item_name) GROUP BY item_name";
	$results = $conn->query($q)->fetch_all(MYSQLI_ASSOC);

	?>

	<button type="button" class="btn btn-outline-warning" style="float:right">
		<a href="admin_login_page.php">Admin Login</a>
	</button>
	<button type="button" class="btn btn-outline-info" style="float:right">
		<a href="user_login_page.php">User Login</a>
	</button>
	<br>
	<br>
	<br>

	<h3 align='center'>
		<b>Items with their best price at your nearest shop:</b>
	</h3>

	<br>
	<br>
	<br>

	<?php
	foreach ($results as $result) :
	?>

	<br>
	<div class="row">
		<img src="Images/<?=$result['N']?>.jpg" width="250" height="250" style="margin-left:100px">
		<h5 style="margin-left:100px"><b><?=$result['N']?></b><br><br><br>Best Price: BDT <?=$result['MP']?><br><br><br>Available at: <?=$result['SN']?></h5>
	</div>
	<br>

	<?php
	endforeach;
	?>

</html>