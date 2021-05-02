<?php

namespace App\core;

#[\Attribute]
class RoleFilter{
	function execute(){
		// if($_SESSION['role'] != 'admin'){
		// 	header('location:'.BASE.'/Product/index');
		// }else{
		// 	header('location:'.BASE.'/Profile/index');
		// }
		echo 'This section is for a specific role....';
	}
}
?>