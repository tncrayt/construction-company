<?php
require ("../connection.php");

if (isset($_GET["sil_id"])){
    $id = $_GET["sil_id"];

    $query=$pdo->prepare("DELETE FROM hizmetler WHERE id=:yid");
    $query->execute([
        "yid"=>$id
    ]);



    header("Location:../anasayfa.php");
}