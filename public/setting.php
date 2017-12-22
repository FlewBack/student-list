<?php
error_reporting(0);
// Загрузка настроек
require('../setting.php');

// Создание класса-помощника
$service = new Service;

// Если студент не зарегестрировался выводит ему информацию об этом
if(isset($_COOKIE['student'])){
	$email = $_COOKIE['student'];
} else {
	$email = "Вы не зарегестрированы. <a href ='index.php' > Регистрация </a>";
}


// Проверяет на условие и изменяет информацию
if(!empty ($_POST)){
	
	foreach($_POST as $key=>$var){
		if(empty($var) || !(isset($var))){
			$error = true;
		}
	} if(!($error)){
		
		// Изменяет информацию о студенте
		$service->changeInfo($pdo);
		
		$_POST = array();
	
	}
}

$array = $service->loadInfo($pdo, $_COOKIE['student']);


// Загрузка шаблона
require('./templates/template-3.html');

