<?php

namespace App\controllers;

#[\App\core\LoginFilter]
class ProductController extends \App\core\Controller
{

	function index()
	{
		$product = new \App\models\Product();
		$product = $product->getProducts();
		// admin
		if ($_SESSION['role'] == 'admin') {
			// filter 
			if (isset($_POST["action"])) {
				$product = new \App\models\Product();
				$product = $product->filterProductsByPrice($_POST["price1"], $_POST["price2"]);
				$this->view('Product/index', ['product' => $product]);
			}
			// ascend
			else if (isset($_POST["ascend"])) {
				$product = new \App\models\Product();
				$product = $product->sortProductsByAscending();
				$this->view('Product/index', ['product' => $product]);
			}
			// descend
			else if (isset($_POST["descend"])) {
				$product = new \App\models\Product();
				$product = $product->sortProductsByDescending();
				$this->view('Product/index', ['product' => $product]);
			}
			// search 
			else if (isset($_POST["search"])){
				$product = new \App\models\Product();
				$product = $product->searchByName($_POST["input"]);
				$this->view('Product/index', ['product' => $product]);
			}
			else {
				$this->view('Product/index', ['product' => $product]);
			}
		// user
		} else if ($_SESSION['role'] == 'user') {
			// filter 
			if (isset($_POST["action"])) {
				$product = new \App\models\Product();
				$product = $product->filterProductsByPrice($_POST["price1"], $_POST["price2"]);
				$this->view('User/index', ['product' => $product]);
			}
			// ascend
			else if (isset($_POST["ascend"])) {
				$product = new \App\models\Product();
				$product = $product->sortProductsByAscending();
				$this->view('User/index', ['product' => $product]);
			}
			// descend
			else if (isset($_POST["descend"])) {
				$product = new \App\models\Product();
				$product = $product->sortProductsByDescending();
				$this->view('User/index', ['product' => $product]);
			} 
			// search 
			else if (isset($_POST["search"])){
				$product = new \App\models\Product();
				$product = $product->searchByName($_POST["input"]);
				$this->view('User/index', ['product' => $product]);
			}
			else {
				$this->view('User/index', ['product' => $product]);
			}
		}
	}

	function create()
	{
		if (isset($_POST['action'])) {
			//complete the upload here
			if (isset($_FILES['image'])) {
				$check = getimagesize($_FILES['image']['tmp_name']);
				$allowedTypes = ['image/gif', 'image/jpeg', 'image/png'];
				if ($check !== false && in_array($check['mime'], $allowedTypes)) {
					//proceed with the upload because of the proper type.
					$extension = ['image/gif' => 'gif', 'image/jpeg' => 'jpg', 'image/png' => 'png'];
					$extension = $extension[$check['mime']];
					$target_folder = 'uploads/';

					$targetFile = uniqid() . ".$extension";
					if (move_uploaded_file($_FILES['image']['tmp_name'], $target_folder . $targetFile)) {
						//save this file information to the DATABASE
						//$targetFile
						$product = new \App\models\Product();
						$product->name = $_POST['name'];
						$product->description = $_POST["description"];
						$product->image = $targetFile;
						$product->qoh = $_POST["qoh"];
						$product->price = $_POST["price"];
						$product->sales = $_POST["sales"];
						$product->insert();
						header("location:" . BASE . "/Product/index");
					} else {
						echo 'error';
					}
				}
			}
		} else
			$this->view('Product/create');
	}

	function details($product_id)
	{
		$product = new \App\models\Product();
		$product = $product->find($product_id);

		$reviews = new \App\models\Review();
		$reviews = $reviews->getReviewsForProduct($product->product_id);
		
		if ($_SESSION['role'] == 'admin') {
			$this->view('Product/details', ['product' => $product, 'reviews' => $reviews]);
		} else if ($_SESSION['role'] == 'user') {
			$this->view('User/details', ['product' => $product, 'reviews' => $reviews]);
		}
	}

	function sortNamesByAscending()
	{
		$product = new \App\models\Product();
		$product = $product->sortProductsByAscending();
		if ($_SESSION['role'] == 'admin') {
			$this->view('Product/index', ['product' => $product]);
		} else if ($_SESSION['role'] == 'user') {
			$this->view('User/index', ['product' => $product]);
		}
	}

	function sortNamesByDescending()
	{
		$product = new \App\models\Product();
		$product = $product->sortProductsByDescending();
		if ($_SESSION['role'] == 'admin') {
			$this->view('Product/index', ['product' => $product]);
		} else if ($_SESSION['role'] == 'user') {
			$this->view('User/index', ['product' => $product]);
		}
	}

	// function filterByPrice(){
	// 	if(isset($_POST["action"])){
	// 		$product = new \App\models\Product();
	// 		$product = $product->filterProductsByPrice($_POST["price1"], $_POST["price2"]);
	// 		if($_SESSION['role'] == 'admin'){
	// 			$this->view('Product/index', ['product' => $product]);
	// 		} 
	// 		else if($_SESSION['role'] == 'user'){
	// 			$this->view('User/index', ['product' => $product]);
	// 		}
	// 	}
	// 	// } else{
	// 	// 	$this->view('Product/index');
	// 	// }
	// }

	// if(isset($_POST["action"])){
	// 	$profile = new \App\models\Profile();
	// 	$profile->user_id = $_SESSION['user_id'];
	// 	$profile->first_name = $_POST["first_name"];
	// 	$profile->last_name = $_POST["last_name"];
	// 	$profile->phone = $_POST["phone"];
	// 	$profile->address = $_POST["address"];
	// 	$profile->insert();
	// 	header("location:".BASE."/Default/login");
	// }else{
	// 	$this->view('Profile/create');
	// }

	function modify($product_id)
	{
		if (isset($_POST["action"])) {
			//complete the upload here
			if (isset($_FILES['image'])) {
				$check = getimagesize($_FILES['image']['tmp_name']);
				$allowedTypes = ['image/gif', 'image/jpeg', 'image/png'];
				if ($check !== false && in_array($check['mime'], $allowedTypes)) {
					//proceed with the upload because of the proper type.
					$extension = ['image/gif' => 'gif', 'image/jpeg' => 'jpg', 'image/png' => 'png'];
					$extension = $extension[$check['mime']];
					$target_folder = 'uploads/';

					$targetFile = uniqid() . ".$extension";
					if (move_uploaded_file($_FILES['image']['tmp_name'], $target_folder . $targetFile)) {
						//save this file information to the DATABASE
						//$targetFile
						$product = new \App\models\Product();
						$product = $product->find($product_id);
						$product->name = $_POST["name"];
						$product->description = $_POST["description"];
						$product->image = $targetFile;
						$product->qoh = $_POST["qoh"];
						$product->price = $_POST["price"];
						$product->sales = $_POST["sales"];
						$product->update();
						header("location:" . BASE . "/Product/index/$product->profile_id");
					} else {
						echo 'error';
					}
				}
			}
		} else {
			$product = new \App\models\Product();
			$product = $product->find($product_id);
			$this->view('Product/modify', ['product' => $product]);
		}
	}

	function delete($product_id)
	{
		if (isset($_POST["action"])) {
			$product = new \App\models\Product();
			$product = $product->find($product_id);
			$product->delete(); // can't delete if sales are recorded
			header("location:" . BASE . "/Product/index/");
		} else {
			$product = new \App\models\Product();
			$product = $product->find($product_id);
			$this->view('Product/delete', ['product' => $product]);
		}
	}

	function makeReview($product_id)
	{
		if(isset($_POST['action']))
		{
			$profile = new \App\models\Profile();
			$profile = $profile->getUser($_SESSION['user_id']);

        	$product = new \App\models\Product();
        	$product = $product->find($product_id);

        	$review = new \App\models\Review();
        	$review->profile_id = $profile->profile_id;
        	$review->product_id = $product_id;
        	$review->rating = $_POST["rating"];
        	$review->review = $_POST["review"];
        	$review->insert();
        	header("location:" . BASE . "/Product/details/$product_id");
        }
		else
		{
			$this->view('Product/makeReview');
		}
	}
}
