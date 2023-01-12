<?php

require ("../connection.php");

if (isset($_POST)){
    $baslik = $_POST["baslik"];
    $aciklama = $_POST["icerik"];



    $hedef_yol = dirname(__FILE__,3)."/images/";
    $hedef_dosya= $hedef_yol.basename($_FILES["resim"]["name"]);
    move_uploaded_file($_FILES['resim']['tmp_name'],$hedef_dosya);
    $yol = "images/".basename($_FILES["resim"]["name"]);

    $query = $pdo->prepare("INSERT INTO slider (baslik,resim,aciklama) VALUES (:baslik,:resim,:aciklama)");
    $query->execute([
        "baslik"=>$baslik,
        "resim"=>$yol,
        "aciklama"=>$aciklama
    ]);

    header("Location:../slider-islem.php");
}