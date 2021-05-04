<html>

<head>
	<title>Log into an account</title>
</head>
<style>
</style>

<body>
	<?php
	if (isset($_GET['error']))
		echo $_GET['error'];
	?>

	<form method="post" action="">

		<h3>LOGIN</h3>
		<label>Username: <input type="text" name="username" /></label><br><br>
		<label>Password: <input type="password" name="password" /></label><br><br>

		<a href="<?= BASE ?>/Default/register">Register a new account</a><br><br>

		<input type="submit" name="action" value="Login" />


	</form>



</body>

</html>