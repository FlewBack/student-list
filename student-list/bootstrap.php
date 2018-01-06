<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(-1);
require_once __DIR__ . '/app/PDO/PDO.php';
require_once __DIR__ . '/app/Models/TableDataGateway.php';
require_once __DIR__ . '/app/Models/Reg.php';
require_once __DIR__ . '/app/Models/Student.php';
require_once __DIR__ . '/app/Models/FrontController.php';

$TDG = new TDG;
$reg = new Reg;

$FrontController = new FrontController;