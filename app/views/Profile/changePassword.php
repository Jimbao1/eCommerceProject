<html>
<head>
	<title>Change password</title>
</head>
<body>
	<?php
		if(isset($_GET['error'])){
			echo $_GET['error'];
		}
	?>
	<form method="post" action="">
		<label>Old password <input type="text" name="old_password" /></label><br />
		<label>New password: <input type="password" name="new_password" /></label><br />
		<label>New password confirmation: <input type="text" name="password_confirm" /></label><br />
		
		<input type="submit" name="action" value="Change Password" /><br>
		<a href="<?= BASE ?>/Profile/index">Cancel</a>

	</form>
</body>
</html>