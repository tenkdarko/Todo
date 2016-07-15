<?php

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=localhost','root','root');


if(!isset($_SESSION['user_id'])){
	echo 'You are not a user!';
}




?>