<?php
require ("../connection.php");

if (isset($_POST)){

    $ana_baslik =$_POST["ana_baslik"];
    $alt_baslik=$_POST["alt_baslik"];
    $proje_sayi=$_POST["proje_sayi"];
    $calisan_sayi=$_POST["calisan_sayi"];
    $icerik=$_POST["icerik"];


   if ($_FILES["görsel"]["size"]!=0){

       $hedef_yol = dirname(__FILE__,3)."/images/";
       $hedef_dosya= $hedef_yol.basename($_FILES["görsel"]["name"]);

       move_uploaded_file($_FILES['görsel']['tmp_name'],$hedef_dosya);

       $yol = "images/".basename($_FILES["görsel"]["name"]);




       $query = $pdo->prepare("UPDATE bolum_1 SET 
                                        ana_baslik=:ana_baslik,
                                        alt_baslik=:alt_baslik,
                                        proje_sayi=:proje_sayi,
                                        personel_sayi=:personel_sayi,
                                        görsel=:gorsel,
                                        icerik=:icerik  WHERE id=:aid");
       $query->execute([
           "aid"=>1,
           "ana_baslik"=>$ana_baslik,
           "alt_baslik"=>$alt_baslik,
           "proje_sayi"=>$proje_sayi,
           "personel_sayi"=>$calisan_sayi,
           "gorsel"=>$yol,
           "icerik"=>$icerik,
       ]);

   }else{
       $query = $pdo->prepare("UPDATE bolum_1 SET 
                                        ana_baslik=:ana_baslik,
                                        alt_baslik=:alt_baslik,
                                        proje_sayi=:proje_sayi,
                                        personel_sayi=:personel_sayi,
                                        icerik=:icerik  WHERE id=:id");
       $query->execute([
           "ana_baslik"=>$ana_baslik,
           "alt_baslik"=>$alt_baslik,
           "proje_sayi"=>$proje_sayi,
           "personel_sayi"=>$calisan_sayi,
           "icerik"=>$icerik,
           "id"=>1
       ]);


   };



  header("Location:../anasayfa.php");
}