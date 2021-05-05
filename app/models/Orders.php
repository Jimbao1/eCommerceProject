<?php
namespace App\models;

class Orders extends \App\core\Model{
    public $profile_id;
	public $order_id;
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
	public function find($order_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders WHERE order_id = :order_id");
		$stmt->execute(['order_id'=>$order_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetch();
	}

	public function findUserCart($profile_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders WHERE profile_id = :profile_id AND status = :status");
		$stmt->execute(['profile_id'=>$profile_id, 'status'=>'cart']);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetch();
	}

	public function findOrders($profile_id){
		$stmt = self::$connection->prepare("SELECT * FROM orders WHERE profile_id = :profile_id");
		$stmt->execute(['profile_id'=>$profile_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO orders(profile_id, status, payment_confirmation) VALUES (:profile_id, :status, :payment_confirmation)");
		$stmt->execute(['profile_id'=>$this->profile_id,'status'=>$this->status, 'payment_confirmation'=>$this->payment_confirmation]);		
        $this->order_id = self::$connection->lastInsertId();
        return $stmt->rowCount();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE orders SET payment_confirmation=:payment_confirmation, status=:status WHERE order_id=:order_id");
		$stmt->execute(['payment_confirmation'=>$this->payment_confirmation, 'status'=>$this->status, 'order_id'=>$this->order_id]);
	}

    public function delete(){
        $stmt = self::$connection->prepare("DELETE FROM orders WHERE order_id=:order_id");
        $stmt->execute(['order_id'=>$this->order_id]);
    }
}
?>