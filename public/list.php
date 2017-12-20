	
<?php
error_reporting(-1);
require('../setting.php');
$service = new Service;

$char = "▲";
$value = "desk";
if ($_GET['button'] == 'desk'){
	$value = "ask";
	$char = "▼";
}
if ($_GET['button'] == 'ask'){
	$students = $service->showTable($pdo, 'ask');
} else{
	$students = $service->showTable($pdo,'desc');
}


require('./templates/template-2.html');

