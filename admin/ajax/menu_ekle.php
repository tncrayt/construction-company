<?php

require ("../connection.php");

if (isset($_POST["menu_ad"])){
    $menu_ad=$_POST["menu_ad"];
    $menu_link=$_POST["menu_link"];

    $sira = $query1 = $pdo->query("SELECT * FROM menuler")->rowCount();


    $query=$pdo->prepare("INSERT INTO menuler (ad,url,sira) VALUES (:mad,:murl,:msira)");
    $query->execute([
        "mad"=>$menu_ad,
        "murl"=>$menu_link,
        "msira"=>$sira+1
    ]);

    header("Location:../menu-islem.php");
}