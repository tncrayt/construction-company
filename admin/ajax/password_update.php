<?php
require("../connection.php");

if (isset($_POST)){
    $eski_sifre = md5($_POST["eski_sifre"]);
    $yeni_sifre= md5($_POST["yeni_sifre"]);

    $admin = $pdo->query("SELECT admin_sifre FROM admin")->fetch();

    $response = [];

    if ($admin["admin_sifre"] == $eski_sifre){

        $query= $pdo->prepare("UPDATE admin SET admin_sifre=:yeni_sifre WHERE admin_id=1");
        $query->execute([
            "yeni_sifre"=>$yeni_sifre,
        ]);
        $response["msg"] = "Şifreniz Hatalı !";
        $response["success"] = true;
        echo json_encode($response);
    }else{

        $response["msg"] = "Şifreniz Hatalı !";
        $response["success"] = false;
        echo json_encode($response);

    }


}

