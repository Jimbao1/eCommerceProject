<html>

<head>
	<title>Product Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	.productDetails {
		margin-top: 50px;
	}
</style>

<body>
	<div class="productDetails">
		<h1 class="h3 mb-3 font-weight-normal text-center">Product Details</h1><br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">QoH</th>
					<th scope="col">Price</th>
					<th scope="col">Sales</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row"><img src='/eCommerceProject/uploads/<?= $data['product']->image ?>' / style='width:110px;height:150px'></th>
					<td><?= $data['product']->name ?></td>
					<td><?= $data['product']->description ?></td>
					<td><?= $data['product']->qoh ?></td>
					<td><?= $data['product']->price ?></td>
					<td><?= $data['product']->sales ?></td>
				</tr>
			</tbody>
		</table>

		<div style="text-align: center">
			<a href='<?= BASE ?>/Product/index'>Return to List</a>
			<br> <br>
			<a href='<?= BASE ?>/Product/index'>Make a Review</a>
		</div>

		<h1 class="h3 mb-3 font-weight-normal text-center">Reviews</h1><br>
		<table class="table table-striped">
			<tr><th>Profile Id</th><th>Rating</th><th>Review</th></tr>
			<?php
				foreach($data['reviews'] as $review)
				{
					echo "<tr>
					<td>
					<td>$review->profile_id</td>
					<td>$review->rating</td>
					<td>$review->review</td>
					</tr>
					";
				}
			?>
		</table>
	</div>
	


</body>

</html>