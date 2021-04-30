<?php
namespace App\controllers;

class DefaultController extends \App\core\Controller{
	function index(){
		$this->view('Default/index');
	}

	function register(){
		if(isset($_POST['action'])){
			//if the passwords match
			if($_POST['password'] == $_POST['password_confirm']){
				$user = new \App\models\User();
				$user->username = $_POST['username'];
				$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
				if($user->insert()){
					header('location:'.BASE.'/Default/login');
				}else{
					header('location:'.BASE.'/Default/register?error=The user was not registered!');//reload
				}
				
			}else
				header('location:'.BASE.'/Default/register?error=Passwords do not match!');//reload
		}else{
			$this->view('Login/Register');
		}
	}



	function login(){
        if(isset($_POST['action'])){
            $user = new \App\models\User();
            $user = $user->findByUsername($_POST['username']);
            //if the password matches the password_hash
            if( $user != null &&
                password_verify($_POST['password'], $user->password_hash) ){
                //log in the user.....
                //remember that user is logged in....
                //two kinds of users: with or without 2-fa
                if($user->two_FA_token == null){
                    $_SESSION['user_id'] = $user->user_id;
                    $_SESSION['username'] = $user->username;
                    $profile = new \App\models\Profile();
                    $profile = $profile->getUserProfile($user->user_id);
                    if (empty($profile)){
                        header('location:'.BASE.'/Profile/createProfile');
                    }else{
                        header('location:'.BASE.'/Profile/index');
                    }
                    
                }else{
                    $_SESSION['temp_user_id'] = $user->user_id;
                    $_SESSION['temp_username'] = $user->username;
                    $_SESSION['two_FA_token'] = $user->two_FA_token; 
                    header('location:'.BASE.'/Default/validateLogin');
                }
            }else
                header('location:'.BASE.'/Default/login?error=Username/password mismatch!');//reload
        }else{
            $this->view('Login/login');
        }
    }

    function logout(){
		session_destroy();
		header('location:'.BASE.'/');
	}


}