<?php
require ("../connection.php");
if (isset($_POST)){
    $site_ad =$_POST["site_adi"];
    $header_renk=$_POST["header_renk"];
    $footer_renk=$_POST["footer_renk"];
    $bg_renk=$_POST["bg_renk"];



    $kisa_tanitim=$_POST["kisa_tanitim"];
    $acilis_zaman=$_POST["acilis_zaman"];
    $kapanis_zaman=$_POST["kapanis_zaman"];




    if ($_FILES["logo_resim"]["size"]!=0){


        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["logo_resim"]["name"]);

        move_uploaded_file($_FILES['logo_resim']['tmp_name'],$hedef_dosya);

        $yol = "images/".basename($_FILES["logo_resim"]["name"]);





        $query=$pdo->prepare("UPDATE ayarlar SET 
                                        site_ad=:asite_ad,
                                        logo_img=:alogo_resim,
                                        header_renk=:aheader_renk,
                                        footer_renk=:afooter_renk,
                                      
                                        kisa_tanitim=:akisa_tanitim,
                                        
                                        acilis_zaman=:aacilis_zaman,
                                        kapanis_zaman=:akapanis_zaman,
                                        bg_renk=:abg_renk WHERE id=:aid");
        $query->execute([
            "asite_ad"=>$site_ad,
            "alogo_resim"=>$yol,
            "aheader_renk"=>$header_renk,
            "afooter_renk"=>$footer_renk,

            "akisa_tanitim"=>$kisa_tanitim,


            "aacilis_zaman"=>$acilis_zaman,
            "akapanis_zaman"=>$kapanis_zaman,

            "abg_renk"=>$bg_renk,
            "aid"=>1
        ]);

    }else{
        $query=$pdo->prepare("UPDATE ayarlar SET 
                                        site_ad=:asite_ad,
                                        header_renk=:aheader_renk,
                                        footer_renk=:afooter_renk,
                                       
                                        kisa_tanitim=:akisa_tanitim,
                                       
                                        acilis_zaman=:aacilis_zaman,
                                        kapanis_zaman=:akapanis_zaman,
                                        bg_renk=:abg_renk WHERE id=:aid");
        $query->execute([
            "asite_ad"=>$site_ad,
            "aheader_renk"=>$header_renk,
            "afooter_renk"=>$footer_renk,

            "akisa_tanitim"=>$kisa_tanitim,


            "aacilis_zaman"=>$acilis_zaman,
            "akapanis_zaman"=>$kapanis_zaman,

            "abg_renk"=>$bg_renk,
            "aid"=>1
        ]);
    }







   header("Location:../genel-ayar.php");


}