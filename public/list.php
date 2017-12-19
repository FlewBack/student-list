
<?php
require('../setting.php');
require('./templates/template-2.html');
var_dump($_COOKIE);
/*
//function selectInfo($pdo){
	$query = $pdo->prepare("SELECT FirstName, SecondName, groupId FROM student");
	$query->execute();
	
	$a = $query->fetchAll();
	print_r($a);
	
	
//}
*/
//selectInfo($pdo);


// ты отключил данные суперглобальной переменной если что
echo 2;