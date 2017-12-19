<?php
require('../setting.php');
require('./templates/template-1.html');

$service = new Service;
if($_COOKIE){
	header("Location:/list.php");
}



if(!empty ($_POST)){
	
	foreach($_POST as $key=>$var){
		if(empty($var) || !(isset($var))){
			$error = true;
		}
	} if(!($error)){
		
		// Add a new student and set cookie
		$service->addStudent($pdo);
		$service->setCookie();
		
		$_POST = array();
		header("Location:/list.php");	
	
	}
}

