<?php

require ("../connection.php");

if (isset($_POST["id_onay"])){

    $id = $_POST["id_onay"];

    $query = $pdo->prepare("UPDATE slider SET durum = :mdurum WHERE id=:mid");
    $query->execute([
        "mdurum" =>1,
        "mid"=>$id
    ]);

}

if (isset($_POST["id_red"])){

    $id = $_POST["id_red"];

    $query = $pdo->prepare("UPDATE slider SET durum = :mdurum WHERE id=:mid");
    $query->execute([
        "mdurum" =>0,
        "mid"=>$id
    ]);

}