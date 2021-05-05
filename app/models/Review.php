<?php
namespace App\models;

class Review extends \App\core\Model{
    public $profile_id;
	public $product_id;
	public $rating;
    public $review;

	public function __construct(){
		parent::__construct();
	}

    public function getReviewsForProduct($product_id){
		$stmt = self::$connection->prepare("SELECT * FROM review WHERE product_id = :product_id");
		$stmt->execute(['product_id'=>$product_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetchAll();	
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO review(profile_id, product_id, rating, review) VALUES (:profile_id, :product_id, :rating, :review)");
		$stmt->execute(['profile_id'=>$this->profile_id,'product_id'=>$this->product_id, 'rating'=>$this->rating, 'review'=>$this->review]);		
        $this->order_id = self::$connection->lastInsertId();
        return $stmt->rowCount();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE review SET rating=:rating, review=:review WHERE profile_id=:profile_id AND product_id=:product_id");
		$stmt->execute(['rating'=>$this->rating, 'review'=>$this->review, 'profile_id'=>$this->profile_id, 'product_id'=>$this->product_id]);
	}

    public function delete(){
        $stmt = self::$connection->prepare("DELETE FROM review WHERE profile_id=:profile_id AND product_id=:product_id");
        $stmt->execute(['profile_id'=>$this->profile_id, 'product_id'=>$this->product_id]);
    }
}
?>