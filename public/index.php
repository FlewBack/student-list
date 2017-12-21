<?php
error_reporting(0);
// Загрузка настроек и шаблона
require('../setting.php');
require('./templates/template-1.html');

// Создание класса-помощника
$service = new Service;

// Если куки существует перенаправлять со страницы авторизации на страницу со списком
if($_COOKIE){
	header("Location:/list.php");
}


// Обрабатывает массив и заносит студента в БД
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

