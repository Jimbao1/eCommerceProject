<html>

<head>
	<title>New Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.createProfile {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
		margin-top: 50px;
	}
</style>

<body class="text-center">
	<div class="createProfile">
		<form method="post" action="">
			<h1 class="h3 mb-3 font-weight-normal">Create Profile</h1>

			<label class="sr-only">First Name</label><br>
			<input type="text" name="first_name" class="form-control" placeholder="First Name">

			<label class="sr-only">Last Name</label><br>
			<input type="text" name="last_name" class="form-control" placeholder="Last Name">

			<label class="sr-only">Phone</label><br>
			<input type="text" name="phone" class="form-control" placeholder="Phone"></input>

			<label class="sr-only">Address</label><br>
			<input type="text" name="address" class="form-control" placeholder="Address"></input><br>

			<input type="submit" name="action" value="Create Profile" class="btn btn-success btn-primary btn-block" /><br>
			<a href="<?= BASE ?>/Default/login">Cancel</a>

		</form>
	</div>




</body>

</html>