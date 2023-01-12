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
                <h1 class="h3 mb-4 text-gray-800">Admin Ayarları</h1>
                <form method="post" id="admin_form" class="w-75">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kullanıcı adı</label>
                        <input type="text" name="kadi" class="form-control" id="exampleFormControlInput1" value="<?php echo $query["admin_kadi"]; ?>" placeholder="<?php echo $query["admin_kadi"]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">E-Posta adresi</label>
                        <input type="email" name="kmail"  class="form-control" id="exampleFormControlInput2" value="<?php echo $query["admin_mail"]; ?>" placeholder="<?php echo $query["admin_mail"]; ?>"                        </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Ad</label>
                <input type="text" name="kad" class="form-control" id="exampleFormControlInput3" value="<?php echo $query["admin_ad"]; ?>" placeholder="<?php echo $query["admin_ad"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput4">Soyad</label>
                <input type="text" name="ksoyad"  class="form-control" id="exampleFormControlInput4" value="<?php echo $query["admin_soyad"]; ?>" placeholder="<?php echo $query["admin_soyad"]; ?>">
            </div>
            </form>
            <button type="submit" id="admin_submit" name="update_admin" class="btn btn-primary">Değişiklikleri Kaydet</button>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Şifremi Değiştir
            </button>

        </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Şifre Değiştir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pass_form">
                    <div class="form-group">
                        <label for="exampleFormControlInput7">Eski Şifre</label>
                        <input type="password" name="eski_sifre" class="form-control" id="exampleFormControlInput7">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput8">Yeni Şifre</label>
                        <input type="password" name="yeni_sifre" class="form-control" id="exampleFormControlInput8">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="submit" id="sifre_change" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</div>

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
<script >
    $(document).ready(function () {

        $("#admin_submit").click(function () {

            $.ajax({
                type:"POST",
                url:"ajax/admin_update.php",
                data:$("#admin_form").serialize(),
                success:function (context) {
                    Swal.fire({
                        title: 'Başarılı!',
                        text: 'İşlem başarılı bir şekilde gerçekleşti',
                        icon: 'success',
                        confirmButtonText: 'Evet'
                    })
                }
            });

        });

        $("#sifre_change").click(function () {

            $.ajax({
                type: "POST",
                url: "ajax/password_update.php",
                data: $("#pass_form").serialize(),

                success:function (data) {
                    const response = JSON.parse(data);
                    if(response.success){
                        Swal.fire({
                            icon: 'success',
                            title: 'İşlem Başarılı !',
                            text: 'Şifreniz Başarıyla Güncellendi',
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'İşlem Başarısız !',
                            text: "Şifreniz Hatalı",
                        })
                    }

                },


            })
        })

    })
</script>


</body>

</html>

