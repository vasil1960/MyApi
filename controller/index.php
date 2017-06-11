<?php 
session_start();

include '../vendor/autoload.php';

$pdo = Connection::make();

$sid = $_GET['sid'] ? $_GET['sid'] : '';

$sessid = new IagSession($pdo, $sid);

$rule = $sessid->userRuls();

if ($rule === "nouser") 
{
	header("Location: https://system.iag.bg"); /* Redirect browser */
	exit();
}
 $sessid ->setIagSession();

var_dump($_SESSION);

// (new IagSession)->setIagSession(Connection::makeconnection(), $_GET['sid']);

// var_dump($sessid);



include '../view/index.view.php';