<?php
namespace App\models;

class User extends \App\core\Model{
	public $user_id;
	public $username;
	public $password_hash;

	public function __construct(){
		parent::__construct();
	}

	public function isValid(){
		return !empty($this->username) && !password_verify('', $this->password_hash);
	}

	public function findById($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function findByUsername($username){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
		$stmt->execute(['username'=>$username]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function insert(){
		if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)");
			return $stmt->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);		
		}else
			return false;
	}

	public function update2fa(){
		$stmt = self::$connection->prepare("UPDATE user SET two_FA_token = :two_FA_token WHERE user_id = :user_id");
		$stmt->execute(['two_FA_token'=>$this->two_FA_token,'user_id'=>$this->user_id]);
	}
}

?>