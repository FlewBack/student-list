	
<?php
error_reporting(0);
// Загрука настроек и подключение БД
require('../setting.php');

// Создание класса-помощника
$service = new Service;


// Если поиск по имени/фамилии не использовался открывает сортировку по баллам
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
// Иначе ищет по имени/фамилии студента и выводит таблицу
} else{
	$char = "Назад";
	$students = $service->showQueryTable($pdo,$_GET['search']);
}

// Загрузка шаблона
require('./templates/template-2.html');

