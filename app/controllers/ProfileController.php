<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class ProfileController extends \App\core\Controller{

	function index()
    {
        $profile = new \App\models\Profile();
		$profile = $profile->getUserProfile($_SESSION['user_id']);
		$this->view('Profile/userProfile', ['profile' => $profile]);
        
    }
	
	function createProfile(){
		if(isset($_POST["action"])){
			$profile = new \App\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST["first_name"];
			$profile->last_name = $_POST["last_name"];
			$profile->phone = $_POST["phone"];
			$profile->address = $_POST["address"];
			$profile->insert();
			header("location:".BASE."/Default/login");
		}else{
			$this->view('Profile/create');
		}
	}

	function modifyProfile($profile_id){
		if(isset($_POST["action"])){
			$profile = new \App\models\Profile();
			$profile = $profile->findById($profile_id);
			$profile->first_name = $_POST["first_name"];
			$profile->last_name = $_POST["last_name"];
			$profile->phone = $_POST["phone"];
			$profile->address = $_POST["address"];
			$profile->profile_id = $profile_id;
			$profile->update();
			header("location:".BASE."/Profile/index/$profile->profile_id");
		} 
		else{
			$profile = new \App\models\Profile();
			$profile = $profile->findById($profile_id);
			$this->view('Profile/modify',['profile'=>$profile]);
		}
	}

	function changePassword($username){
		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user = $user->findByUsername($username);
			if (password_verify($_POST['old_password'], $user->password_hash) && 
				$_POST["new_password"] == $_POST["password_confirm"] ){
					$user->password_hash = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
					$user->changePassword();
					header('location:'.BASE.'/Profile/index');
			}else{
					header("location:".BASE."/Profile/changePassword/$user->username"."?error=Retry!");
			} 
		} 
		else{
			$user = new \App\models\User();
			$user = $user->findByUsername($username);
			$this->view('Profile/changePassword',['user'=>$user]);
		}
	}


	
}