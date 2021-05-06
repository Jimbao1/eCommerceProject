<html>

<head>
	<title>Add a Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.createProduct {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
		margin-top: 50px;
	}
</style>

<body class="text-center">

	<div class="createProduct">
		<form action="" method="post" enctype="multipart/form-data">
			<h1 class="h3 mb-3 font-weight-normal">Add a Product</h1>

			<label class="sr-only">Name</label><br>
			<input type="text" name="name" class="form-control" placeholder="Name">

			<label class="sr-only">Description</label><br>
			<textarea name="description" class="form-control" placeholder="Description"></textarea>

			<label class="sr-only">Image</label><br>
			<input type="file" name="image" class="form-control">

			<label class="sr-only">QoH</label><br>
			<input type="number" name="qoh" class="form-control" placeholder="QoH">

			<label class="sr-only">Price</label><br>
			<input type="number" name="price" class="form-control" placeholder="Price"></input>

			<label class="sr-only">Sales</label><br>
			<input type="number" name="sales" class="form-control" placeholder="Sales" value="0" readonly></input><br>

			<input type="submit" name="action" value="Add Product" class="btn btn-success btn-primary btn-block" /><br>
			<a href="<?= BASE ?>/Product/index">Cancel</a>
		</form>
	</div>

</body>

</html>