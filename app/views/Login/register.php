<html>

<head>
	<title>Register an account</title>
</head>
<style>
	
</style>

<body>
	<?php
	if (isset($_GET['error'])) {
		echo $_GET['error'];
	}
	?>
	
		<form method="post" action="">
			
				<h3>REGISTER</h3>
				<label>Username: <input type="text" name="username" /></label><br><br>
				<label>Password: <input type="password" name="password" /></label><br><br>
				<label>Password confirmation: <input type="password" name="password_confirm" /></label><br><br>
				<a href="<?= BASE ?>/Default/login">Already have an account? Login.</a><br><br>
				<input type="submit" name="action" value="Register" />
			
				
				
			
		</form>

	

</body>

</html>