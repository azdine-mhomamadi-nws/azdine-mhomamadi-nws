<?php
// conneion à la base de données 
$dsn = 'mysql:host=localhost:10010;dbname=local;charset=utf8';
$username = 'root';
$password = 'root';
$pdo = new PDO($dsn,$username,$password);