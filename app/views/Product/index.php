<html>
<style>
	.card {
		margin: 20px;
	}
</style>

<head>
	<title>Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

	<h1>List of Products</h1>
	<p><a href='<?= BASE ?>/Product/create'>Add a Product</a></p>
	<p><a href='<?= BASE ?>/Profile/index'>Return to Profile</a></p>
	<p><a href='<?= BASE ?>/Product/sortNamesByAscending'>Sort by Ascending Order</a></p>
	<p><a href='<?= BASE ?>/Product/sortNamesByDescending'>Sort by Descending Order</a></p>
	<p><a href='<?= BASE ?>/Product/index'>Reset Sort</a></p>
	<form action="" method="post">
		<h3>Filter by Price</h3>
		<label>Price 1: <input type="number" name="price1" /></label><br><br>
		<label>Price 2: <input type="number" name="price2" /></label></label>
		<input type="submit" name="action" value="Filter Products"><br><br>
	</form>

	<div class="container">
		<div class="row">
			<?php
			foreach ($data['product'] as $product) {
				echo "<div class='col-sm-3'>
						<div class='card' style='width: 15rem;'>
						<div class='card-header text-center'>$product->name</div>
							<img class='card-img-top smallimg mx-auto' src='" . BASE . "/uploads/$product->image' alt='$product->name' style='width:150px;height:150px'>
							<div class='card-body'>
								<p class='card-text text-center'>$product->description</p>
								<p class='card-text text-center'>Price: $product->price$ 	Quantity: $product->qoh</p>
							</div>
							<div class='card-footer text-center'>
									<a href='" . BASE . "/Product/details/$product->product_id' class='btn btn-primary btn-sm'>Details</a>
									<a href='" . BASE . "/Product/modify/$product->product_id' class='btn btn-success btn-sm'>Edit</a>
									<a href='" . BASE . "/Product/delete/$product->product_id' class='btn btn-danger btn-sm'>Delete</a>
							</div>
						</div>
					</div>";
			} ?>
		</div>
	</div>
</body>

</html>