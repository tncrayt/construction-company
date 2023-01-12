<?php

$dbhost="localhost";
$dbname="insaat";
$dbuser="root";


try {
    $pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";charset=utf8",$dbuser,"");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}catch (PDOException $exception){
    echo $exception->getMessage();
}
