<html>

<head>
	<title>Delete a Product</title>
</head>
<style>
	
</style>

<body>

	<form method="post" action="">
	<h1>Delete this Product</h1>
    <dl>
	    <dt>Name</dt>
	    <dd><?=$data['product']->name ?></dd>
	</dl>
	<dl>
		<dt>Description</dt>
		<dd><?=$data['product']->description ?></dd>
	</dl>
	<dl>
		<dt>Image</dt>
		<dd><img src='/eCommerceProject/uploads/<?=$data['product']->image ?>' / style='width:110px;height:150px'></dd>
	</dl>
	<dl>
		<dt>QoH</dt>
		<dd><?=$data['product']->qoh ?></dd>
	</dl>
	<dl>
		<dt>Price</dt>
		<dd><?=$data['product']->price ?></dd>
	</dl>
	<dl>
		<dt>Sales</dt>
		<dd><?=$data['product']->sales ?></dd>
	</dl>
		<input type="submit" name="action" value="Delete" /><br><br>
		<a href="<?= BASE ?>/Product/index">Cancel</a>
		</form>
		
</body>

</html>