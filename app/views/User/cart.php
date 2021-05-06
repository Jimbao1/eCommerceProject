<html>

<head>
	<title>My Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<br>
	<h5 style="margin-left: 50px;"><a href='<?= BASE ?>/Product/index'>Return to Product List</a></h5>
	<br>

	<div class="container">
		<h1>My Cart</h1>

		<table class="table table-striped">
			<tr>
				<th>Picture</th>
				<th>Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Item Price</th>
				<th>Actions</th>
			</tr>
			<?php
			$sum = 0;
			foreach ($data as $item) {
				echo "<tr><td><img src='" . BASE . "/uploads/$item->image'  / style='width:110px;height:150px'></td>
					<td>$item->name</td>
					<td>
						<a href='" . BASE . "/User/removeQuantity/$item->orders_detail_id' class='btn btn-primary'>-</a>
						$item->quantity
						<a href='" . BASE . "/User/addQuantity/$item->orders_detail_id' class='btn btn-primary'>+</a>
						</td>
					<td>$item->price</td>
					<td>" . $item->quantity * $item->price . "$</td>
					<td>
						<a href='" . BASE . "/User/details/$item->product_id' class='btn btn-primary'>Details</a>
						<a href='" . BASE . "/User/removeFromCart/$item->orders_detail_id' class='btn btn-danger'>Remove</a>
					</td>
					</tr>
					";
				$sum += $item->quantity * $item->price;
			}
			?>
			<tr>
				<th colspan="4">Subtotal: </th>
				<th><?= $sum ?>$</th>
				<th>
					<a href='<?= BASE ?>/User/checkout' class='btn btn-success'>Checkout</a>
				</th>
			</tr>
		</table>
	</div>

</body>

</html>