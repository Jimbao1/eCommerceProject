<html>

<head>
	<title>Create a Product</title>
</head>
<style>
	
</style>

<body>
    <form action="" method="post" enctype="multipart/form-data">
		<h3>Create a Product</h3>
		<label>Name: <input type="text" name="name" /></label><br><br>
        <label>Description: <textarea name="description"></textarea></label>
		<label>Image: <input type="file" name="image" /></label><br><br>
		<label>QoH: <input type="text" name="qoh" /></label><br><br>
        <label>Price: <input type="text" name="price" /></label><br><br>
        <label>Sales: <input type="text" name="sales" /></label><br><br>
		<input type="submit" name="action" value="Add Product"><br><br>
		<a href="<?= BASE ?>/Product/index">Cancel</a>
	</form>
	


</body>

</html>