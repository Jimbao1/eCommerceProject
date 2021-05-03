<html>
<style>
	

</style>

<head>
	<title>Product Details</title>
</head>

<body>
	<h1>Product Details</h1>

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

		<p><a href='<?= BASE ?>/Product/index'>Return to List</a></p>

	</div>
</body>

</html>