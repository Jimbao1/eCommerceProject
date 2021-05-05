<html>

<head>
	<title>Orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	
	<p><a href='<?= BASE ?>/Product/index'>Go Back to Product List</a></p>
	
	<div class="container">
		<h1>Orders</h1>

		<table class="table table-striped">
			<tr><th>Order Id</th><th>Status</th><th>Actions</th></tr>
			<?php
				if($data != null)
				{
					foreach($data as $item)
					{
						if($item->status != 'cart')
						{
							echo "<tr>
							<td>$item->order_id</td>
							<td>$item->status</td>
							<td>
								<a href='".BASE."/User/viewAdminOrderDetails/$item->order_id' class='btn btn-primary'>View</a>
							</td>
							</tr>
							";
						}
					}
				}
			?>
		</table>
	</div>

</body>

</html>