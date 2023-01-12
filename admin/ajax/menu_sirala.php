<?php

require("../connection.php");

if (isset($_POST["sira_dizi"])){

    $dizi = $_POST["sira_dizi"];


    foreach ($dizi as $key=>$value){


        $query=$pdo->prepare("UPDATE menuler SET sira=:msira WHERE id=:mid");

        $query->execute([
            "msira"=>$key,
            "mid"=>$value
        ]);

    }




//    $id=$_POST["h_id"];
//
//    $query=$pdo->prepare("UPDATE menuler SET sira=:msira WHERE id=:mid");
//    $query->execute([
//        "msira"=>$menu_ad,
//        "mid"=>$id
//    ]);

    //header("Location:../menu-islem.php");

}