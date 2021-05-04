<html>

<head>
	<title>Delete a Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.deleteProduct {
		margin-top: 50px;
	}
</style>

<body>

	<div class="deleteProduct">
		<form method="post" action="">
			<h1 class="h3 mb-3 font-weight-normal text-center">Delete a Product</h1><br>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Image</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">QoH</th>
						<th scope="col">Price</th>
						<th scope="col">Sales</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row"><img src='/eCommerceProject/uploads/<?= $data['product']->image ?>' / style='width:110px;height:150px'></th>
						<td><?= $data['product']->name ?></td>
						<td><?= $data['product']->description ?></td>
						<td><?= $data['product']->qoh ?></td>
						<td><?= $data['product']->price ?></td>
						<td><?= $data['product']->sales ?></td>
						<td><input type="submit" name="action" value="Delete Product" class="btn btn-danger"/></td>
					</tr>
				</tbody>
			</table>
			<div style="text-align: center">
				<a href="<?= BASE ?>/Product/index">Cancel</a>
			</div>
		</form>
	</div>


</body>

</html>