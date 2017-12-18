<?php
require('../setting.php');
require('./templates/template-1.html');
function query($pdo){
	//get name and other infromation about studen as variables
	
	$FN = $_POST['FirstName'];
	$LN = $_POST['LastName'];
	$SOP = $_POST['points']; 
	$query =$pdo->query("INSERT INTO a VALUES('$FN','$LN')");
	
	$names = [$FN,$LN,$SOP];
	
	return $names;
}

if(!empty ($_POST)){
	
	foreach($_POST as $key=>$var){
		if(empty($var) || !(isset($var))){
			$error = true;
		}
	} if(!($error)){
		//get the array containing info about a student
		$name = query($pdo);
	
		$string = implode($name);
		setcookie("student",$string, time() +11);
		$_POST = array();
		header("Location:/list.php");	
	
	}
}
// здесь где-то ошибка с ифами так как перенаправляет на страницу лист и заносит пстую инфу в бд
