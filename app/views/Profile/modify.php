<html>

<head>
	<title>Modify the user profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.modifyProduct {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
</style>

<body>

	<div class="modifyProduct">
		<form method="post" action="">
			<h1 class="h3 mb-3 font-weight-normal text-center">Modify Profile</h1>

			<label>First Name</label>
			<input type="text" name="first_name" class="form-control" value="<?= $data['profile']->first_name ?>"><br>

			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control" value="<?= $data['profile']->last_name ?>"></input><br>

			<label>Phone</label>
			<input type="text" name="phone" class="form-control" value="<?= $data['profile']->phone ?>"><br>

			<label>Address</label>
			<input type="text" name="address" class="form-control" value="<?= $data['profile']->address ?>"><br>

			<input type="submit" name="action" value="Modify Profile" class="btn btn-success btn-primary btn-block" /><br>

			<div style="text-align: center">
				<a class="text-center" href="<?= BASE ?>/Profile/index">Cancel</a>
			</div>
		</form>
	</div>


</body>

</html>