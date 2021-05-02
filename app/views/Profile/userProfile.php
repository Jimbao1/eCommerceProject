<html>
<style>
	

</style>

<head>
	<title>Profile</title>
</head>

<body>
	
		<h1>Wall of <?= $_SESSION['username'] ?> </h1>
		

		<h2>PROFILE</h2>
		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Edit</th>
			</tr>
			<?php
			foreach ($data['profile'] as $profile) {

				echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td><td>$profile->phone</td><td>$profile->address</td>
					<td><a href='" . BASE . "/Profile/modifyProfile/$profile->profile_id'>Edit</a>
					</td></tr>";
			}
			?>
		</table> <br>
		<p><a href='<?= BASE ?>/Product/index'>View Products</a></p>
		<p><a href='<?= BASE ?>/Profile/changePassword/<?= $_SESSION['username'] ?>'>Change Password</a></p>
		<p><a href='<?= BASE ?>/Default/logout'>Logout</a></p>
		


	</div>
</body>

</html>