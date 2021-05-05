<html>

<head>
	<title>My Order Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	
	<p><a href='<?= BASE ?>/Product/index'>Go Back to Product List</a></p>
	
	<div class="container">
		<h1>My Order Details</h1>

		<table class="table table-striped">
			<tr><th>Picture</th><th>Name</th><th>Quantity</th><th>Unit Price</th><th>Item Price</th></tr>
			<?php
			$sum = 0;
				foreach($data as $item)
				{
					echo "<tr><td><img src='".BASE."/uploads/$item->image'  / style='width:110px;height:150px'></td>
					<td>$item->name</td>
					<td>
						$item->quantity
						</td>
					<td>$item->price</td>
					<td>".$item->quantity*$item->price."$</td>
					</tr>
					";
					$sum += $item->quantity*$item->price;
				}
			?>
			<tr>
				<th colspan="4">Total: </th><th><?= $sum ?>$</th>
			</tr>
		</table>
	</div>

</body>

</html>