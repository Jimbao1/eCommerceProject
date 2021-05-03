<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class UserController extends \App\core\Controller{

	function index()
    {
        // $product = new \App\models\Product();
		// $product = $product->getProducts();
		// if ($_SESSION['role'] == 'admin'){
		// 	$this->view('Product/index', ['product' => $product]);
		// } else if ($_SESSION['role'] == 'user'){
		// 	$this->view('User/index', ['product' => $product]);
		// }
    }
	
    function details($product_id){
		$product = new \App\models\Product();
        $product = $product->find($product_id);
        $this->view('Product/details', ['product'=>$product]);
	}

    function addToCart($product_id){
        $profile = new \App\models\Profile();
		$profile = $profile->getUser($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->find($product_id);
        
        $cart = new \App\models\Orders();
        $cart = $cart->find($profile->profile_id);
        if($cart == null){
            $cart = new \App\models\Orders();
            $cart->profile_id = $profile->profile_id;
            $cart->status = 'cart';
            $cart->order_id = $cart->create();
        }
        $cartProduct = new \App\models\Orders_detail();
        $cartProduct->order_id = $cart->order_id;
        $cartProduct->product_id = $product_id;
        $cartProduct->price = $product->price;
        $cartProduct->quantity = 1;
        $cartProduct->create();

    }

}