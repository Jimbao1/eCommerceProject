<?php
namespace App\models;

class Profile extends \App\core\Model{
	public $user_id;
	public $profile_id;
	public $first_name;
	public $last_name;
	public $phone;
	public $address;

	public function __construct(){
		parent::__construct();
	}

	public function isValid(){
		return !empty($this->user_id) && !empty($this->first_name) && !empty($this->middle_name) && !empty($this->last_name);
	}
	
	public function findById($profile_id){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
		$stmt->execute(['profile_id'=>$profile_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		return $stmt->fetch();
	}

	public function findByFirstName($first_name){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name = :first_name");
		$stmt->execute(['first_name'=>$first_name]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		return $stmt->fetch();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO profile(user_id, first_name, last_name, phone, address) VALUES (:user_id, :first_name, :last_name, :phone, :address)");
		$stmt->execute(['user_id'=>$this->user_id,'first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'phone'=>$this->phone, 'address'=>$this->address]);		
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE profile SET profile_id=:profile_id, first_name=:first_name, last_name=:last_name, phone=:phone, address=:address WHERE profile_id=:profile_id");
		$stmt->execute(['profile_id'=>$this->profile_id, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'phone'=>$this->phone, 'address'=>$this->address]);
	}

	public function getUserProfile($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		return $stmt->fetchAll();
	}

	public function getUser($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		return $stmt->fetch();
	}

	public function getSearchResults($first_name){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name LIKE CONCAT('%', :first_name, '%')");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		$stmt->execute(['first_name'=>$first_name]);
		return $stmt->fetchAll();	
	}

	public function getSearchedProfile($first_name){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name = :first_name");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		$stmt->execute(['first_name'=>$first_name]);
		return $stmt->fetchAll();
	}

	public function getProfiles(){
		$stmt = self::$connection->query("SELECT * FROM profile");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
		return $stmt->fetchAll();	
	}
}
?>