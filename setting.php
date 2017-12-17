<?php
spl_autoload_register(function ($class) {
    // Получаем путь к файлу из имени класса
    $path = __DIR__ . "/public" . "/app" . "/$class" . '.php';
    // Если в текущей папке есть такой файл, то выполняем код из него
    if (file_exists($path)) {
        require_once $path;
    }
    // Если файла нет, то ничего не делаем - может быть, класс 
    // загрузит какой-то другой автозагрузчик или может быть, 
    // такого класса нет
});


// PDO options

$host = '127.0.0.1';
$db   = 'training';
$user = 'root';
$pass = 'admin';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
	   ];

$pdo = new PDO($dsn, $user, $pass, $opt);