<?php

namespace App\core;

//good to help me write DRY code
#[\Attribute]
class LoginFilter extends Controller{
	function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:'.BASE.'/Default/index');
		}
		
	}

	// public static function UserFilter($params){
	// 	if($_SESSION['user_id'] == null){
	// 		return '/Default/index';
	// 	}else{
	// 		return false;
	// 	}
	// }

	// public static function AdminFilter($params){
	// 	if($_SESSION['role'] !== 'admin'){
	// 		return '/Default/index';
	// 	}else{
	// 		return false;
	// 	}
	// }
}
?>