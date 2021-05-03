<html>
<style>
	.card {
		margin: 20px;
	}
</style>

<head>
	<title>List of Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<h1>List of Products</h1>
	<p><a href='<?= BASE ?>/Profile/index'>Return to Profile</a></p>
	<p><a href='<?= BASE ?>/User/viewCart'>My Cart</a></p>
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
									<a href='" . BASE . "/User/addToCart/$product->product_id' class='btn btn-success'>Add</a>
									<a href='" . BASE . "/User/details/$product->product_id' class='btn btn-primary'>Details</a>
							</div>
						</div>
					</div>";
			} ?>
		</div>
	</div>

</body>

</html>