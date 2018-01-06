<?php
require_once __DIR__ . '/../bootstrap.php';

// мы призвали обхект reg как параметр поэтому он там виден а $TDG или фронтконтроллер нет
$FrontController->Response($_SERVER['REQUEST_URI'], $reg, $TDG, $PDO);

$student =2;
// $TDG->AddStudent
//require("../templates/registration.html");

