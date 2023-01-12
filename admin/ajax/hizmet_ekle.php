<?php

require ("../connection.php");

if (isset($_POST)){

    $baslik = $_POST["baslik"];
    $aciklama = $_POST["aciklama"];



    if ($_FILES["icon"]["size"]!=0){

        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["icon"]["name"]);
        move_uploaded_file($_FILES['icon']['tmp_name'],$hedef_dosya);
        $yol = "images/".basename($_FILES["icon"]["name"]);

        $query = $pdo->prepare("INSERT INTO hizmetler (baslik,görsel,icerik) VALUES (:baslik,:gorsel,:icerik)");
        $query->execute([
           "baslik"=>$baslik,
           "gorsel"=>$yol,
           "icerik"=>$aciklama,
        ]);

        header("Location:../anasayfa.php");

    }








}