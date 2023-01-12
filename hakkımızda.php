<?php
require "admin/connection.php";

$query=$pdo->query("SELECT *,concat(DATE_FORMAT(acilis_zaman,\"%H:%i\"),\"-\",DATE_FORMAT(kapanis_zaman,\"%H:%i\")) as zaman  from ayarlar");
$ayarlar= $query->fetch();


?>


<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hakkımızda | <?= $ayarlar["site_ad"] ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>



<body style="background-color: <?= $ayarlar["bg_renk"] ?>">

<?php
include "includes/header.php";
?>

<?php
$query=$pdo->query("SELECT * FROM hakkimizda");
$hakkimizda=$query->fetch();
?>
<div class="container-fluid p-0">
    <div>
        <img src="https://www.enka.com/wp-content/uploads/2015/07/About_Us_si_4_2018.jpg" alt="" class="w-100" >
    </div>

    <div class="container">
        <?= $hakkimizda["icerik"] ?>
    </div>
</div>


  <!-- Footer Bottom -->
<?php
include "includes/footer.php";
?>
  <!-- Footer Bottom -->
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/fontawesome.js"></script>

</body>

</html>