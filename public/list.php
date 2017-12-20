	
<?php
error_reporting(0);
require('../setting.php');
$service = new Service;

/*if($_GET['buton'] == 'desk'){
	
} else {
	
}*/
if(!isset($_GET['search'])){
if ($_GET['button'] == 'desk'){
	$value = "ask";
	$char = "▼";
} elseif ($_GET['button'] == "ask"){
	$value = "desk";
	$char = "▲";
}

else{
	$value = "ask";
	$char = "▼";
}


if ($_GET['button'] == 'desc'){
	$students = $service->showTable($pdo, 'desc');
} else{
	$students = $service->showTable($pdo,'ask');
}

 
if ($_GET['button'] == 'ask'){
	$students = $service->showTable($pdo, 'ask');
} else{
	$students = $service->showTable($pdo,'desc');
}
}
var_dump($_GET);

require('./templates/template-2.html');

