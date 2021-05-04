<html>
<style>
	.card {
		top: 50%;
		left: 50%;
	}
</style>

<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="text-center">

	<h1 class="h3 mb-3 font-weight-normal text-center" style="margin-top: 30px;">Your Profile</h1>
	<a href='<?= BASE ?>/Product/index'>View Products</a><br>
	<a href='<?= BASE ?>/Profile/changePassword/<?= $_SESSION['username'] ?>'>Change Password</a><br><br>

	<?php
	$username = $_SESSION['username'];
	foreach ($data['profile'] as $profile) {
		echo "<div class='col-md-6'>
			<div class='card mb-3'>
				<div class='card-body'>
					<div class='row'>
						<div class='col-sm-3'>
							<h6 class='mb-0'>First Name</h6>
						</div>
						<div class='col-sm-9 text-secondary'>
							$profile->first_name
						</div>
					</div>
					<hr>
					<div class='row'>
						<div class='col-sm-3'>
							<h6 class='mb-0'>Last Name</h6>
						</div>
						<div class='col-sm-9 text-secondary'>
							$profile->last_name
						</div>
					</div>
					<hr>
					<div class='row'>
						<div class='col-sm-3'>
							<h6 class='mb-0'>Phone</h6>
						</div>
						<div class='col-sm-9 text-secondary'>
							$profile->phone
						</div>
					</div>
					<hr>
					<div class='row'>
						<div class='col-sm-3'>
							<h6 class='mb-0'>Address</h6>
						</div>
						<div class='col-sm-9 text-secondary'>
							$profile->address
						</div>
					</div>
					<hr>
					<div class='row'>
						<div class='col-sm-3'>
							<h6 class='mb-0'>Action</h6>
						</div>
						<div class='col-sm-9 text-secondary'>
							<a href='" . BASE . "/Profile/modifyProfile/$profile->profile_id'>Edit</a>
						</div>
					</div>
				</div>
			</div></div>";;
	}
	?>
	<a href='<?= BASE ?>/Default/logout'>Logout</a>
	
</body>

</html>