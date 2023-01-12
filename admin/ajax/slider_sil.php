<?php
require ("../connection.php");

if (isset($_GET)){

    $id = $_GET["id"];

    $query= $pdo->prepare("DELETE FROM slider WHERE id=:sid");
    $query->execute([
        "sid"=>$id,
    ]);
    header("Location:../slider-islem.php");

}