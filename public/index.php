<?php
require('../setting.php');
require('./templates/template-1.html');

if($_COOKIE){
	header("Location:/list.php");
}

function query($pdo){
	
	$query =$pdo->prepare("INSERT INTO student VALUES(:FN,:LN,:GI,:POINTS,:EMAIL,:SEX,:REGISTRATION)");
	$query->bindValue(':FN',$_POST['FirstName']);
	$query->bindValue(':LN',$_POST['LastName']);
	$query->bindValue(':GI',$_POST['groupId']);
	$query->bindValue(':POINTS',$_POST['points']);
	$query->bindValue(':EMAIL',$_POST['email']);
	$query->bindValue(':SEX', $_POST['sex']);
	$query->bindValue(':REGISTRATION',$_POST['resident']);
	
	$query->execute();
	
}

if(!empty ($_POST)){
	
	foreach($_POST as $key=>$var){
		if(empty($var) || !(isset($var))){
			$error = true;
		}
	} if(!($error)){
		
		query($pdo);
	
		$string = $_POST['FirstName'].$_POST['LastName'].$_POST['points'];
		setcookie("student",$string, time() +11);
		$_POST = array();
		header("Location:/list.php");	
	
	}
}
// здесь где-то ошибка с ифами так как перенаправляет на страницу лист и заносит пстую инфу в бд
