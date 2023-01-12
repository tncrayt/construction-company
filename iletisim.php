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
  <title>İletişim | <?= $ayarlar["site_ad"] ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>


<body style="background-color: <?= $ayarlar["bg_renk"] ?>">

<?php
include "includes/header.php";
?>

<div class="container mt-2">
    <h1 class="c-sari fs-3 fw-bold">Bize Ulaşın</h1>
</div>

<div class="container">
<div class="card bg-light">
    <ul class="list-unstyled" style="column-count: 2">
        <li>
            <span class="fw-bold">Adresimiz:</span>
            <p><?= $ayarlar["adres"] ?></p>
        </li>
        <li>
            <span class="fw-bold">Telefon No:</span>
            <p><?= $ayarlar["tel"] ?></p>
        </li>
        <li>
            <span class="fw-bold">E-Posta Adresimiz:</span>
            <p><?= $ayarlar["email"] ?></p>
        </li>
        <li>
            <span class="fw-bold">Sosyal Medya Hesaplarımız:</span>
            <?php
            $query = $pdo->query("SELECT * FROM sosyal");
            $sosyals= $query->fetchAll();
            ?>
            <ul class="d-flex list-unstyled gap-3 mb-0">
                <?php foreach ($sosyals as $sosyal): ?>
                    <li>
                        <a href="<?= $sosyal["link"] ?>"
                           target="_blank"
                        >
                            <img src="<?= $sosyal["görsel"] ?>" class="icon_sosyal" alt="">
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </li>
    </ul>



</div>
</div>



  <div class="container py-3">
    <div class="row">
      <div class="col-md-7">
        <form class="row g-3">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Adınız:</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Adınız">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Soyadınız:</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Soyadınız">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">E-Posta Adresiniz:</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="xxxx@gmail.com">
          </div>

          <div class="col-md-12">
            <label for="inputAddress" class="form-label">Konu Başlığı:</label>
            <select class="form-select" aria-label="Default select example">
              <option value="1">Şikayet</option>
              <option value="3">Destek</option>
            </select>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label d-block">Mesajınız:</label>
            <textarea name="" id="" class="w-100" rows="10"></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn bg_mavi text-white">Mesajımı Gönder</button>
          </div>

        </form>
      </div>
      <div class="col harita">
        <?= $ayarlar["harita_link"] ?>
      </div>

    </div>
  </div>

<?php
include "includes/footer.php";
?>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/fontawesome.js"></script>
</body>

</html>