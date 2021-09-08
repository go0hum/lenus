<?php 

$HostName = 'localhost';
$UserName = 'root';
$Password = 'root';
$Database = 'lenus';
$Port = 3306;

$Conn = mysqli_connect($HostName, $UserName, $Password, $Database, $Port);

if (!$Conn) {
    echo "Error connection";
    exit;
}