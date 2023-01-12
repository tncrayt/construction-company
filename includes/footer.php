<?php
require "admin/connection.php";
$query=$pdo->query("SELECT * from menuler WHERE durum=1");
$menuler= $query->fetchAll();

?>

<?php
$query=$pdo->query("SELECT *,concat(DATE_FORMAT(acilis_zaman,\"%H:%i\"),\"-\",DATE_FORMAT(kapanis_zaman,\"%H:%i\")) as zaman  from ayarlar");
$ayarlar= $query->fetch();

?>

<footer class="container-fluid footer_color" style="background-color: <?= $ayarlar["footer_renk"] ?>">
    <div class="container p-0 p-md-4">
        <div class="row">
            <div class="col-md-4">
                <h1 class="fs-6 text-white fw-bold mb-3">Biz Kimiz ?</h1>
                <a href="index.php">
                    <img src="<?= $ayarlar["logo_img"] ?>" class="mb-3 logo" alt="">
                </a>
                <p class="text-white">
                    <?= $ayarlar["kisa_tanitim"] ?>
                </p>
            </div>

            <div class="col-md">
                <h1 class="fs-6 text-white fw-bold mb-3">Destek</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">
                    <li>
                        <a href=" #" class="text-white text-decoration-none menu_link">Sıkça Sorulan Sorular</a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none menu_link">Kullanım Haklarımız</a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none menu_link">Gizlik Sözleşmesi</a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none menu_link">İletişime Geçin</a>
                    </li>

                </ul>
            </div>

            <div class="col-md">
                <h1 class="fs-6 text-white fw-bold mb-3">Bağlantılar</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">
                    <?php foreach ($menuler as $menu): ?>
                    <li>
                        <a href="<?=$menu["url"] ?>" class="text-white text-decoration-none menu_link"><?= $menu["ad"] ?></a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>



            <div class="col-md-4">
                <h1 class="fs-6 text-white fw-bold mb-3">İletişim Bilgilerimiz</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">

                    <li class="text-white d-flex align-items-center">
                        <i class="fa-regular fa-map me-2"></i>
                        <span><?= $ayarlar["adres"] ?></span>
                    </li>


                    <li class="text-white d-flex">
                        <i class="fa-solid fa-square-phone me-2"></i>
                        <?= $ayarlar["tel"] ?>
                    </li>
                    <li class="text-white d-flex">
                        <i class="fa-regular fa-envelope me-2"></i>
                        <span> <?= $ayarlar["email"] ?></span>
                    </li>
                    <li class="text-white d-flex">
                        <i class="fa-regular fa-calendar me-2"></i>
                        <?= $ayarlar["zaman"] ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-center pb-2 d-md-flex d-none">
        <?php
        $query = $pdo->query("SELECT * FROM sosyal");
        $sosyals= $query->fetchAll();
        ?>
        <span class="text-white">© 2022 <?php echo $ayarlar["site_ad"] ?></span>
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
    </div>
</footer>