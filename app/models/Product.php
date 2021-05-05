<?php
namespace App\models;

class Product extends \App\core\Model{
	public $product_id;
	public $name;
	public $description;
	public $image;
	public $qoh;
    public $price;
    public $sales;

	public function __construct(){
		parent::__construct();
	}

    public function getProducts(){
		$stmt = self::$connection->query("SELECT * FROM product");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\product");
		return $stmt->fetchAll();	
	}

	public function sortProductsByAscending(){
		$stmt = self::$connection->query("SELECT * FROM product ORDER BY name");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\product");
		return $stmt->fetchAll();	
	}

	public function sortProductsByDescending(){
		$stmt = self::$connection->query("SELECT * FROM product ORDER BY name DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\product");
		return $stmt->fetchAll();	
	}

	public function filterProductsByPrice($price1, $price2){
		$stmt = self::$connection->query("SELECT * FROM product WHERE price BETWEEN $price1 AND $price2");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\product");
		return $stmt->fetchAll();	
	}

	public function searchByName($input){
		$stmt = self::$connection->query("SELECT * FROM product WHERE name LIKE '%$input%'");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\product");
		return $stmt->fetchAll();
	}

	public function find($product_id){
		$stmt = self::$connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
		$stmt->execute(['product_id'=>$product_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetch();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO product(name, description, image, qoh, price, sales) VALUES (:name, :description, :image, :qoh, :price, :sales)");
		$stmt->execute(['name'=>$this->name,'description'=>$this->description, 'image'=>$this->image, 'qoh'=>$this->qoh, 'price'=>$this->price, 'sales'=>$this->sales]);		
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE product SET name=:name, description=:description, image=:image, qoh=:qoh, price=:price, sales=:sales WHERE product_id=:product_id");
		$stmt->execute(['product_id'=>$this->product_id, 'name'=>$this->name,'description'=>$this->description, 'image'=>$this->image, 'qoh'=>$this->qoh, 'price'=>$this->price, 'sales'=>$this->sales]);
	}

    public function delete(){
        $stmt = self::$connection->prepare("DELETE FROM product WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $this->product_id]);
    }

}
?>