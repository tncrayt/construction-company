<?php

require("../connection.php");

if (isset($_POST["menu_ad"])){

    $menu_ad=$_POST["menu_ad"];
    $menu_link=$_POST["menu_link"];
    $id=$_POST["h_id"];

    $query=$pdo->prepare("UPDATE menuler SET ad=:mad,url=:murl WHERE id=:mid");
    $query->execute([
        "mad"=>$menu_ad,
        "murl"=>$menu_link,
        "mid"=>$id
    ]);

    header("Location:../menu-islem.php");

}