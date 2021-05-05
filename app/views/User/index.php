<html>
<style>
	.card {
		margin: 20px;
	}

	a {
		font-size: larger;
	}
</style>

<head>
	<title>List of Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div style="text-align:center; margin-top:30px">
		<h1>Product Catalog</h1><br>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href='<?= BASE ?>/Product/index'>Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href='<?= BASE ?>/Profile/index'>Return to Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href='<?= BASE ?>/User/viewOrders'>View Orders</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href='<?= BASE ?>/User/viewCart'>View Cart</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sort by Name
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<div style="text-align: center;">
							<form action="" method="post">
								<a class="dropdown-item"><input type="submit" name="ascend" value="Ascend" class='btn btn-secondary '></a>
								<a class="dropdown-item"><input type="submit" name="descend" value="Descend" class='btn btn-secondary '></a>
							</form>
						</div>
					</div>
				</li>
				<form action="" method="post">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Filter by Price
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align:right;">
							<a class="dropdown-item"><label>From: <input type="number" name="price1" /></label></a>
							<a class="dropdown-item"><label>To: <input type="number" name="price2" /></a>
							<div style="text-align:center">
								<input type="submit" name="action" value="Filter">
							</div>
					</li>
				</form>
				<form action="" method="post" class="form-inline my-2 my-lg-0" style="margin-left: 500px;">
					<input type="text" name="input" placeholder="Search" aria-label="Search">
					<input type="submit" name="search" value="Search">
				</form>
			</ul>
		</div>
	</nav><br>

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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>