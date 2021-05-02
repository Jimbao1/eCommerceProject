<html>

<head>
	<title>Modify a Product</title>
</head>
<style>
	
</style>

<body>

	<form method="post" action="" enctype="multipart/form-data">
		<h1>Modify a Product</h1>
		<label>Name: <input type="text" name="name" value="<?= $data['product']->name ?>" /></label><br><br>
	    <label>Description: <textarea name="description"><?= $data['product']->description ?></textarea></label><br><br>
        <label>Image: <input type="file" name="image" value="<?= $data['product']->image ?>" /></label><br><br>
		<label>QoH: <input type="text" name="qoh" value="<?= $data['product']->qoh ?>" /></label><br><br>
		<label>Price: <input type="text" name="price" value="<?= $data['product']->price ?>" /></label><br><br>
        <label>Sales: <input type="text" name="sales" value="<?= $data['product']->sales ?>" /></label><br><br>
		<input type="submit" name="action" value="Modify Product" /><br><br>
		<a href="<?= BASE ?>/Product/index">Cancel</a>
		</form>
		
</body>

</html>