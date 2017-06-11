<?php

include '../vendor/autoload.php';

$pdo = Connection::make();

$empl = new Empl($pdo);

$empl->seyHello();

var_dump($empl);

//include '../view/index.view.php';