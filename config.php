<?php

$dsn = 'mysql:host=localhost;dbname=ticket1';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $dbh = new PDO($dsn, $user, $pass, $option);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    echo 'Failed To Connect' . $e->getMessage();
}
?>