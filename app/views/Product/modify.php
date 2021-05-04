<html>

<head>
	<title>Modify a Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.modifyProduct {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
		transform: scale(0.9, 0.9);
	}
</style>

<body>
	<div class="modifyProduct">
		<form method="post" action="" enctype="multipart/form-data">
			<h1 class="h3 mb-3 font-weight-normal text-center">Modify a Product</h1>

			<label>Name</label>
			<input type="text" name="name" class="form-control" value="<?= $data['product']->name ?>"><br>

			<label>Description</label>
			<textarea name="description" class="form-control" placeholder="Description"><?= $data['product']->description ?></textarea><br>

			<label>Image</label>
			<input type="file" name="image" class="form-control" value="<?= $data['product']->image ?>"><br>

			<label>QoH</label>
			<input type="number" name="qoh" class="form-control" value="<?= $data['product']->qoh ?>"><br>

			<label>Price</label>
			<input type="number" name="price" class="form-control" value="<?= $data['product']->price ?>"></input><br>

			<label>Sales</label>
			<input type="number" name="sales" class="form-control" value="<?= $data['product']->sales ?>"></input><br>

			<input type="submit" name="action" value="Modify Product" class="btn btn-success btn-primary btn-block" /><br>
			
			<div style="text-align: center">
				<a class="text-center" href="<?= BASE ?>/Product/index">Cancel</a>
			</div>

		</form>
	</div>




</body>

</html>