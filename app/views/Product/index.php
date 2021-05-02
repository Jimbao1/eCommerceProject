<html>
<style>
	

</style>

<head>
	<title>Product</title>
</head>

<body>
    
	<h1>List of Products</h1>
    <p><a href='<?= BASE ?>/Product/create'>Add a Product</a></p>
    <p><a href='<?= BASE ?>/Profile/index'>Return to Profile</a></p>
	<table>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Image</th>
			<th>QoH</th>
			<th>Price</th>                
            <th>Sales</th>
            <th>Actions</th>
		</tr>
			<?php
			foreach ($data['product'] as $product) {
				echo "<tr><td>$product->name</td>
                    <td>$product->description</td>
                    <td><img src='" . BASE . "/uploads/$product->image' / style='width:110px;height:150px'></td>
                    <td>$product->qoh</td>
                    <td>$product->price</td>
                    <td>$product->sales</td>
                    <td><a href='" . BASE . "/Product/details/$product->product_id'>Details</a></td>
					<td><a href='" . BASE . "/Product/modify/$product->product_id'>Edit</a></td>
                    <td><a href='" . BASE . "/Product/delete/$product->product_id'>Delete</a></td>
                    </tr>";
                    }?>
		</table> <br>
        
	</div>
</body>

</html>