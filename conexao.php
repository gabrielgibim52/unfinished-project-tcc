<?php 

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'evento';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conexao->connect_errno)
    echo"erro";
?>
