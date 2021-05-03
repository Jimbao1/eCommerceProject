<?php
namespace App\models;

class Orders_detail extends \App\core\Model{
    public $orders_detail_id;
    public $order_id;
    public $product_id;
    public $quantity;
    public $price;

	public function __construct(){
		parent::__construct();
	}

	public function findForOrder($order_id)
	{
		$stmt = self::$connection->prepare("SELECT orders_detail.*, product.* FROM orders_detail 
			JOIN product ON orders_detail.product_id = product.product_id WHERE orders_detail.order_id = :order_id");
		$stmt->execute(['order_id'=>$order_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders_detail");
		return $stmt->fetchAll();
	}

    public function find($orders_detail_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders_detail WHERE orders_detail_id = :orders_detail_id");
		$stmt->execute(['orders_detail_id'=>$orders_detail_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders_detail");
		return $stmt->fetch();
	}

	public function findProduct($product_id, $order_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders_detail WHERE product_id = :product_id AND order_id = :order_id");
		$stmt->execute(['product_id'=>$product_id, 'order_id'=>$order_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders_detail");
		return $stmt->fetch();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO orders_detail(order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)
			ON DUPLICATE KEY UPDATE quantity = quantity+:quantity");
		$stmt->execute(['order_id'=>$this->order_id,'product_id'=>$this->product_id, 'quantity'=>$this->quantity, 'price'=>$this->price]);
		return $stmt->rowCount();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE orders_detail SET order_id=:order_id, product_id=:product_id, quantity=:quantity, price=:price WHERE orders_detail_id=:orders_detail_id");
		$stmt->execute(['order_id'=>$this->order_id, 'product_id'=>$this->product_id,'quantity'=>$this->quantity, 'price'=>$this->price, 'orders_detail_id'=>$this->orders_detail_id]);
	}

    public function delete(){
        $stmt = self::$connection->prepare("DELETE FROM orders_detail WHERE orders_detail_id=:orders_detail_id");
        $stmt->execute(['orders_detail_id'=>$this->orders_detail_id]);
    }
}
?>