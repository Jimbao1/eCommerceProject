<?php
namespace App\models;

class Orders extends \App\core\Model{
    public $profile_id;
	public $orders_id;
	public $status;
    public $payment_confirmation;

	public function __construct(){
		parent::__construct();
	}

    public function getOrders(){
		$stmt = self::$connection->query("SELECT * FROM orders");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetchAll();	
	}
	public function find($orders_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders WHERE orders_id = :orders_id");
		$stmt->execute(['orders_id'=>$orders_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetch();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO orders(profile_id, status, payment_confirmation) VALUES (:profile_id, :status, :payment_confirmation)");
		$stmt->execute(['profile_id'=>$this->profile_id,'status'=>$this->status, 'payment_confirmation'=>$this->payment_confirmation]);		
        $this->order_id = self::$connection->lastInsertId();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE orders SET name=:name, description=:description, image=:image, qoh=:qoh, price=:price, sales=:sales WHERE orders_id=:orders_id");
		$stmt->execute(['orders_id'=>$this->orders_id, 'name'=>$this->name,'description'=>$this->description, 'image'=>$this->image, 'qoh'=>$this->qoh, 'price'=>$this->price, 'sales'=>$this->sales]);
	}

    public function delete(){
        $stmt = self::$connection->prepare("DELETE FROM orders WHERE orders_id=:orders_id");
        $stmt->execute(['orders_id'=>$this->orders_id]);
    }

}
?>