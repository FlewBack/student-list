	
<?php
error_reporting(0);
require('../setting.php');
$service = new Service;

$char = "▲";
$value = "desk";
var_dump($_GET);
if ($_GET['button'] == 'desk'){
	$value = "ask";
	$char = "▼";
}

$students = $service->showTable($pdo);

$col1 = 5;
$col2 = 100;
$col3 = 20;
$col4 = 14;

function padRight($string, $length){
	$stringLen = mb_strlen($string);
	//объявляем переменную для пустого пространства
	$space ="";
	for (;$stringLen < $length; $stringLen++){
		$space .= " ";
	}
	echo "$string$space";
}

require('./templates/template-2.html');

