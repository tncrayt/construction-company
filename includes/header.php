<?php
require "admin/connection.php";

$query=$pdo->query("SELECT *,concat(DATE_FORMAT(acilis_zaman,\"%H:%i\"),\"-\",DATE_FORMAT(kapanis_zaman,\"%H:%i\")) as zaman  from ayarlar");
$ayarlar= $query->fetch();

?>


<!--  Header Top -->
<div class="container py-md-3">
    <div class="align-items-center justify-content-between d-none d-md-flex">
        <a href="index.php">
            <img src="<?=$ayarlar["logo_img"] ?>" alt="" class="logo">
        </a>

        <ul class="header_iletisim d-flex list-unstyled mb-0 gap-4">
            <li class="d-flex align-items-center me-2">
                <i class="fa-solid fa-phone c-sari me-3"></i>
                <div class="d-flex flex-column">
                    <span class="small">Bizi Arayın:</span>
                    <a href="tel:+05303497419" class="c_mavi text-decoration-none fw-bold small "><?=$ayarlar["tel"] ?></a>
                </div>
            </li>

            <li class="d-flex align-items-center me-2">
                <i class="fa-solid fa-envelope c-sari me-3"></i>
                <div class="d-flex flex-column">
                    <span class="small">Email Adresimiz:</span>
                    <a href="mailto:Eteon@7oroof.com" class="c_mavi text-decoration-none fw-bold small"><?=$ayarlar["email"] ?></a>
                </div>
            </li>
            <li class="d-flex align-items-center">
                <i class="fa-solid fa-clock c-sari me-3"></i>
                <div class="d-flex flex-column">
                    <span class="small">Açılış Saatleri:</span>
                    <strong class="text-black-50 small">Hafta İçi: <?=$ayarlar["zaman"] ?></strong>
                </div>
            </li>

        </ul>
        <a href="iletisim.php"
           class="bg_sari px-3 py-2 text-decoration-none d-flex align-items-center justify-content-between rounded">
            <i class="fa-solid fa-arrow-right me-3 bg-white p-1 rounded-circle c-sari"></i>
            <span class="text-white fw-bold">Teklif Al</span>
        </a>

    </div>
</div>
<!--  Header Top -->

<?php
$query=$pdo->query("SELECT * from menuler WHERE durum=1 ORDER BY sira ASC");
$menuler= $query->fetchAll();

?>

<!-- Header Bottom -->
<nav class="navbar navbar-expand-lg navbar-light bg_mavi sticky-top" style="background-color: <?= $ayarlar["header_renk"] ?>">
    <div class="container">
        <a class="navbar-brand d-block d-md-none" href="index.php">
            <img src="<?=$ayarlar["logo_img"] ?>" alt="" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 py-2">

                <?php foreach ($menuler as $menu): ?>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold menu_link" href="<?=$menu["url"] ?>" tabindex="-1"
                       aria-disabled="true"><?= $menu["ad"] ?></a>
                </li>
                <?php endforeach; ?>


            </ul>

        </div>
    </div>
</nav>
<!-- Header Bottom -->
