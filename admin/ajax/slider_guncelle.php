<?php

require("../connection.php");

if (isset($_POST)) {
    $id = $_POST["slider_id"];
    $baslik = $_POST["baslik"];
    $aciklama = $_POST["icerik"];

    if ($_FILES["resim"]['size'] == 0){

        $query = $pdo->prepare("UPDATE slider SET baslik=:baslik,aciklama=:aciklama WHERE id=:id");
        $query->execute([
            "id"=>$id,
            "baslik" => $baslik,
            "aciklama" => $aciklama
        ]);

    }else{


        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["resim"]["name"]);
        move_uploaded_file($_FILES['resim']['tmp_name'],$hedef_dosya);
        $yol = "images/".basename($_FILES["resim"]["name"]);


        $query = $pdo->prepare("UPDATE slider SET baslik=:baslik,resim=:resim,aciklama=:aciklama WHERE id=:id");
        $query->execute([
            "id"=>$id,
            "baslik" => $baslik,
            "resim" => $yol,
            "aciklama" => $aciklama
        ]);
    }



    header("Location:../slider-islem.php");
}