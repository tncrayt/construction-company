<?php
session_start();
if (!$_SESSION["login"]){
    header("Location:login.php");
}
?>
<?php
require ("connection.php");
$query = $pdo->query("SELECT * FROM admin")->fetch();
?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include "templates/nav.php"
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $query["admin_ad"]." ". $query["admin_soyad"] ?></span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="admin_ayar.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ayarlar
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıkış
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-flex justify-content-between align-items-start">
                    <h1 class="h3 mb-4 text-gray-800">Anasayfa</h1>
                </div>
                <div class="card">
                    <div class="card-header">Bölüm-1</div>
                    <div class="card-body">
                        <?php
                        $query = $pdo->prepare("SELECT * FROM bolum_1 WHERE id=:id");
                        $query->execute([
                            "id"=>1,
                        ]);
                        $tanitim = $query->fetch();

                        ?>
                        <form action="ajax/bolum_1.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ana Başlık</label>
                                <input type="text" name="ana_baslik" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["ana_baslik"] ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Alt Başlık</label>
                                <input type="text" name="alt_baslik" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["alt_baslik"] ?>">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tamamlanan Proje Sayısı</label>
                                        <input type="text" name="proje_sayi" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["proje_sayi"] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Çalışan Sayısı</label>
                                        <input type="text" name="calisan_sayi" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["personel_sayi"] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="d-block">Önce Çıkan Görsel</label>
                                <img src="<?= "../".$tanitim["görsel"] ?>" id="resim_goster" data-fancybox="gallery" style="height: 250px;width: 250px;object-fit: contain">
                                <input type="file" id="slider_resim" name="görsel" accept="images/*" class="d-block form-control mt-3">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlInput1">İçerik</label>
                                <textarea name="icerik" id="editor" class="form-control"><?= $tanitim["icerik"] ?></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Kaydet</button>

                        </form>
                    </div>
                </div>

                <div class="card mt-3 mb-5">
                    <div class="card-header d-flex justify-content-between">
                        <span>Hizmetler Alanı</span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hizmet_ekle">
                            Hizmet Ekle
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Başlık</th>
                                <th scope="col">İkon</th>
                                <th scope="col">İçerik</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query= $pdo->query("SELECT * FROM hizmetler");
                            $hizmetler = $query->fetchAll();
                            ?>
                            <?php foreach ($hizmetler as $hizmet): ?>
                            <tr>
                                <td><?= $hizmet["baslik"] ?></td>
                                <td>
                                    <img src="<?= "../".$hizmet["görsel"] ?>" alt="" width="50" height="50">
                                </td>
                                <td><?= $hizmet["icerik"] ?></td>
                                <td>
                                    <a href="<?= "ajax/hizmet_sil.php?sil_id=".$hizmet["id"] ?>" class="btn btn-danger">Sil</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <div class="modal fade close_pass" id="hizmet_ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hizmet Ekle</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajax/hizmet_ekle.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Başlık</label>
                            <input type="text" class="form-control" name="baslik"  placeholder="Başlık Ekle">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="d-block">İkon</label>
                            <img src="#" id="resim_goster1"  data-fancybox="gallery" style="height: 150px;width: 150px;object-fit: contain">
                            <input type="file" id="slider_resim1" name="icon" accept="images/*" class="d-block form-control mt-3">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Açıklama</label>
                            <textarea name="aciklama"  cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                            <input type="submit"  class="btn btn-success guncelle_btn" value="Kaydet">
                        </div>

                    </form>

                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="modal fade close_pass" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sosyal Medya Hesabı Ekle</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="ajax/sosyal_ekle.php" enctype="multipart/form-data">


                        <span class="mb-2 d-block">Ad</span>
                        <input type="text" id="duzenle_ad" class="w-100 p-2 mb-2" name="sosyal_ad" placeholder="Menü adını giriniz...">

                        <span class="mb-2 d-block">Sosyal Medya İcon</span>
                        <img src="#" alt="" id="resim_goster" style="height: 50px;width: 50px;object-fit: cover">
                        <input type="file" name="sosyal_resim" accept="image/*" id="slider_resim">

                        <span class="mb-2 d-block mt-2">Sosyal Medya Bağlantısı</span>
                        <input type="text"  name="sosyal_baglanti" placeholder="Menü linkini giriniz..." class="w-100 p-2 mb-2">


                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                    <input type="submit"  class="btn btn-success guncelle_btn" value="Kaydet">
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End of Footer -->

    <div class="modal fade close_pass" id="düzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sosyal Medya Hesabı Düzenle</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="ajax/sosyal_guncelle.php" enctype="multipart/form-data">

                        <input type="hidden" name="h_id" value="1" class="hidden_id">
                        <span class="mb-2 d-block">Ad</span>
                        <input type="text" id="duzenle_ad" class="w-100 p-2 mb-2 ds_ad" name="sosyal_ad" placeholder="Menü adını giriniz...">

                        <span class="mb-2 d-block">Sosyal Medya İcon</span>
                        <img src="#" class="ds_img" alt="" id="resim_goster1" style="height: 50px;width: 50px;object-fit: cover">
                        <input type="file" name="sosyal_resim" accept="image/*" id="slider_resim1">

                        <span class="mb-2 d-block">Sosyal Medya Bağlantısı</span>
                        <input type="text"  id="duzenle_link" name="sosyal_link" placeholder="Menü linkini giriniz..." class="w-100 p-2 mb-2 ds_link">


                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                    <input type="submit"  class="btn btn-success guncelle_btn" value="Güncelle">
                </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- End of Content Wrapper -->


</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade close_pass" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Çıkış Yap</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Mevcut oturumdan çıkmak istediğinize emin misiniz ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                <a class="btn btn-primary" href="logout.php">Çıkış</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="vendor/ckeditör/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            language: 'tr',
            height: 650
        } );

    $("#resim_goster").show();
    $("#slider_resim").change(function (e) {
        let input = e.target;
        const reader = new FileReader();

        reader.onload = function () {
            const dataURL = reader.result;
            $("#resim_goster").show();
            $("#resim_goster").attr("src",dataURL);
        }
        reader.readAsDataURL(input.files[0]);

    });

    $("#resim_goster1").hide();
    $("#slider_resim1").change(function (e) {
        let input = e.target;
        const reader = new FileReader();

        reader.onload = function () {
            const dataURL = reader.result;
            $("#resim_goster1").show();
            $("#resim_goster1").attr("src",dataURL);
        }
        reader.readAsDataURL(input.files[0]);

    })
</script>

</body>

</html>

