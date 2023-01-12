<?php
require ("../connection.php");

if (isset($_POST)){

    $email=$_POST["email"];
    $tel=$_POST["tel"];
    $adres=$_POST["adres"];
    $harita=$_POST["harita"];

    $query=$pdo->prepare("UPDATE ayarlar SET 
                                        email=:aemail,
                                        tel=:atel,
                                        adres=:aadres,
                                        harita_link=:aharita_link
                                         WHERE id=:aid");
    $query->execute([
        "aemail"=>$email,
        "atel"=>$tel,
        "aadres"=>$adres,
        "aharita_link"=>$harita,

        "aid"=>1
    ]);

    header("Location:../iletisim.php");


}