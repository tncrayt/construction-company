<?php
require ("./connection.php");

session_start();

$query=$pdo->prepare("INSERT INTO loglar (ip_adres,giris_tarih,cikis_tarih) VALUES (:lip,:lgiris_tarih,:lcikis_tarih)");
$query->execute([
    "lip"=>$_SESSION["ip"],
    "lgiris_tarih"=>$_SESSION["giris_tarih"],
    "lcikis_tarih"=> date("Y-m-d H:m:s"),
]);

session_destroy();

header("Location:login.php");

