<?php

$host = 'localhost';
$dbname = 'bot_proxys';
$usuario = 'root';
$senha = '';

$unir = mysqli_connect($host,$usuario,$senha,$dbname);


if (!$unir){
	die('Error ao conectar ao mysql'.mysqli_connect_error());
}



?>