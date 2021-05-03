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
        //$cart = $cart->find($profile->profile_id);
        $cart = $cart->findUserCart($profile->profile_id);
        if($cart == null){
            $cart = new \App\models\Orders();
            $cart->profile_id = $profile->profile_id;
            $cart->status = 'cart';
            $cart->payment_confirmation = 'Not confirmed';
            /*$cart->order_id = */$cart->insert();
            $cart = $cart->findUserCart($profile->profile_id);
        }
        $cartProduct = new \App\models\Orders_detail();
        $cartProduct = $cartProduct->findProduct($product_id, $cart->order_id);
        if($cartProduct == false)
        {
            $cartProduct = new \App\models\Orders_detail();
            $cartProduct->order_id = $cart->order_id;
            $cartProduct->product_id = $product_id;
            $cartProduct->price = $product->price;
            $cartProduct->quantity = 1;
            $cartProduct->insert();
            /*echo '<pre>';
            var_dump($cartProduct);*/
        }
        else
        {
            $cartProduct->quantity = $cartProduct->quantity+1;
            $cartProduct->update();
            /*echo '<pre>';
            var_dump($cartProduct);*/
        }
        header("location:".BASE."/Product/index");
    }

    function viewCart()
    {
        $profile = new \App\models\Profile();
        $profile = $profile->getUser($_SESSION['user_id']);

        $cart = new \App\models\Orders();
        $cart = $cart->findUserCart($profile->profile_id);
        $items = new \App\models\Orders_detail();
        $items = $items->findforOrder($cart->order_id);
        /*echo '<pre>';
        var_dump($items);*/
        $this->view('/User/cart', $items);
    }

    function removeFromCart($orders_detail_id)
    {
        $item = new \App\models\Orders_detail();
        $item = $item->find($orders_detail_id);
        $order = new \App\models\Orders();
        $order = $order->find($item->order_id);
        /*echo '<pre>';
        var_dump($item);*/

        //keep array of cart items
        $profile = new \App\models\Profile();
        $profile = $profile->getUser($_SESSION['user_id']);
        //

        if($order->profile_id == $profile->profile_id)
        {
            $item->delete();
        }

        $cart = new \App\models\Orders();
        $cart = $cart->findUserCart($profile->profile_id);
        $items = new \App\models\Orders_detail();
        $items = $items->findforOrder($cart->order_id);

        $this->view('/User/cart', $items);
    }

    function checkout()
    {
        $profile = new \App\models\Profile();
        $profile = $profile->getUser($_SESSION['user_id']);

        $cart = new \App\models\Orders();
        $cart = $cart->findUserCart($profile->profile_id);
        $cart->payment_confirmation = 'confirmed';
        $cart->status = 'paid';
        $cart->update();

        

        header("location:".BASE."/Profile/index");
    }

    function removeQuantity($orders_detail_id)
    {
        $item = new \App\models\Orders_detail();
        $item = $item->find($orders_detail_id);
        $order = new \App\models\Orders();
        $order = $order->find($item->order_id);

        //keep array of cart items
        $profile = new \App\models\Profile();
        $profile = $profile->getUser($_SESSION['user_id']);
        //

        if($order->profile_id == $profile->profile_id && $item->quantity > 1)
        {
            --$item->quantity;
            $item->update();
        }

        $cart = new \App\models\Orders();
        $cart = $cart->findUserCart($profile->profile_id);
        $items = new \App\models\Orders_detail();
        $items = $items->findforOrder($cart->order_id);

        $this->view('/User/cart', $items);
    }

    function addQuantity($orders_detail_id)
    {
        $item = new \App\models\Orders_detail();
        $item = $item->find($orders_detail_id);
        $order = new \App\models\Orders();
        $order = $order->find($item->order_id);

        //keep array of cart items
        $profile = new \App\models\Profile();
        $profile = $profile->getUser($_SESSION['user_id']);
        //

        if($order->profile_id == $profile->profile_id)
        {
            ++$item->quantity;
            $item->update();
        }

        $cart = new \App\models\Orders();
        $cart = $cart->findUserCart($profile->profile_id);
        $items = new \App\models\Orders_detail();
        $items = $items->findforOrder($cart->order_id);

        $this->view('/User/cart', $items);
    }
}