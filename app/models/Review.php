<?php
namespace App\models;

class Review extends \App\core\Model{
    public $profile_id;
	public $product_id;
	public $rating;
    public $review;
	public $first_name;

	public function __construct(){
		parent::__construct();
	}

    public function getReviewsForProduct($product_id){
		$stmt = self::$connection->prepare("SELECT review.product_id, review.rating, review.review, profile.first_name
		FROM review 
		INNER JOIN profile ON review.profile_id=profile.profile_id
		WHERE review.product_id =:product_id");
		$stmt->execute(['product_id'=>$product_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders");
		return $stmt->fetchAll();	

		// $stmt = self::$connection->prepare("SELECT orders_detail.*, product.* FROM orders_detail 
		// 	JOIN product ON orders_detail.product_id = product.product_id WHERE orders_detail.order_id = :order_id");
		// $stmt->execute(['order_id'=>$order_id]);
		// $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Orders_detail");
		// return $stmt->fetchAll();
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
