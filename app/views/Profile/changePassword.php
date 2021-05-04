<html>

<head>
	<title>Change password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.changePassword {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
		margin-top: 50px;
	}
</style>

<body class="text-center">
	<div class="changePassword">
		<form method="post" action="">
			<h1 class="h3 mb-3 font-weight-normal">Change Password</h1>
			<?php
			if (isset($_GET['error']))
				echo $_GET['error'];
			?>
			<label class="sr-only">Old Password</label>
			<input type="password" name="old_password" class="form-control" placeholder="Old Password">

			<label class="sr-only">New Password</label>
			<input type="password" name="new_password"" class=" form-control" placeholder="New Password">

			<label class="sr-only">Password Confirmation</label>
			<input type="password" name="password_confirm" class="form-control" placeholder="New Password Confirm"><br>

			<input type="submit" name="action" value="Change Password" class="btn btn-success btn-primary btn-block" /><br>
			<a href="<?= BASE ?>/Profile/index">Cancel</a>
		</form>
	</div>

</body>

</html>