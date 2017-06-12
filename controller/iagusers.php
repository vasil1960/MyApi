<?php

include '../vendor/autoload.php';


$pdo = Connection::make();

$emp = new Empl($pdo);

$a = $emp->seyHello();

var_dump($a);

//include '../view/index.view.php';