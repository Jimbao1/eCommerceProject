<html>

<head>
	<title>Modify the user profile</title>
</head>
<style>
	
</style>

<body>
	
			<form method="post" action="">
				<h3>MODIFY USER PROFILE</h3>
				<label>First name: <input type="text" name="first_name" value="<?= $data['profile']->first_name ?>" /></label><br><br>
				<label>Last name: <input type="text" name="last_name" value="<?= $data['profile']->last_name ?>" /></label><br><br>
				<label>Phone: <input type="text" name="phone" value="<?= $data['profile']->phone ?>" /></label><br><br>
				<label>Address: <input type="text" name="address" value="<?= $data['profile']->address ?>" /></label><br><br>
				<input type="submit" name="action" value="Submit Changes" /><br><br>
				<a href="<?= BASE ?>/Profile/index">Cancel</a>
			</form>
		



</body>

</html>