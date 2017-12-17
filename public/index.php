<?php

$values = array();
$errors = array();
require('../setting.php');
require('./templates/template-1.html');

function test($pdo){
	$FN = $_POST['FirstName'];
	$LN = $_POST['LastName'];
	
	$query = $pdo->query("INSERT INTO a VALUES('$FN','$LN')");
	
	echo $FN;
}
if($_POST){
	$values = $_POST;
	foreach($values as $key =>$value){
		if(empty($value)){
			$errors[] = $value;
		}
	}
	if (!$errors){
		var_dump($_POST);
		test($pdo);
	}
}

/*
function test(){
	$FN = $_POST['FirstName'];
	$query = $pdo->query("INSERT INTO a values('$FN')");
	echo $FN;
}


// requre settings and the template


$obj  = new student();*/