<html>

<head>
	<title>Make a Review</title>
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

			<label class="sr-only">Rating</label><br>
			<input type="number" name="rating" class="form-control" placeholder="Rating" min="0" max="10" value="5">

			<label class="sr-only">Review</label><br>
			<textarea name="review" class="form-control" placeholder="Review"></textarea>

			<input type="submit" name="action" value="Add Product" class="btn btn-success btn-primary btn-block" /><br>
			<a href="<?= BASE ?>/Product/index">Cancel</a>
		</form>
	</div>

</body>

</html>