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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 99999px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 25px;
            width: 25px;
            left: 0px;
            bottom: 0px;
            border-radius: 100%;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(25px);
            -ms-transform: translateX(25px);
            transform: translateX(25px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

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
                    <h1 class="h3 mb-4 text-gray-800">Menü İşlemleri</h1>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#ekle">Ekle</button>
                </div>


                <div>
                    <?php
                    $query= $pdo->query("SELECT * FROM menuler ORDER BY sira ASC");
                    $data=$query->fetchAll();
                    $say=1;
                    ?>


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Sıra No</th>
                            <th scope="col">Menü Adı</th>
                            <th scope="col">Url</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">İşlem</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($data as $menu): ?>
                            <tr id="<?= $menu["id"] ?>">
                                <td><?php echo $say++?></td>
                                <td class="d-none islem_id"><?php echo $menu["id"]; ?></td>
                                <td class="islem_ad"><?php echo $menu["ad"]; ?></td>

                                <td>
                                    <a target="_blank" class="islem_link" href="<?php echo $menu["url"]; ?>"><?php echo $menu["url"]; ?></a>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="onay_kontrol" data-id="<?php echo $menu["id"]; ?>" <?php echo $menu["durum"]==1 ? "checked" : null ?>>
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td><?php echo $menu["tarih"]; ?></td>
                                <td>
                                    <a href="<?php echo "ajax/menu_sil.php?id=".$menu["id"]; ?>" class="btn btn-danger">Sil</a>
                                    <button href="#"  data-toggle="modal" data-target="#düzenle" class="btn btn-warning duzenle">Düzenle</button>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
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


<div class="modal fade close_pass" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menü Ekle</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ajax/menu_ekle.php" method="post">

                    <span class="mb-2 d-block">Menü Ad</span>
                    <input type="text"  class="w-100 p-2 mb-2" name="menu_ad" placeholder="Menü adını giriniz...">



                    <span class="mb-2 d-block">Menü Link</span>
                    <input type="text" name="menu_link" placeholder="Menü linkini giriniz..." class="w-100 p-2 mb-2">


            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                <input type="submit" class="btn btn-success" value="Kaydet">
            </div>
            </form>

        </div>
    </div>
</div>




<div class="modal fade close_pass" id="düzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menü Düzenle</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="ajax/menu_guncelle.php" id="guncelle_form">

                    <input type="hidden" name="h_id" value="1" class="hidden_id">
                    <span class="mb-2 d-block">Menü Ad</span>
                    <input type="text" id="duzenle_ad" class="w-100 p-2 mb-2" name="menu_ad" placeholder="Menü adını giriniz...">


                    <span class="mb-2 d-block">Menü Link</span>
                    <input type="text" id="duzenle_link" name="menu_link" placeholder="Menü linkini giriniz..." class="w-100 p-2 mb-2">


            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                <input type="submit"  class="btn btn-success guncelle_btn" value="Güncelle">
            </div>
            </form>

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
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


<script>
    $("#resim_goster").hide();
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
    
    $(".onay_kontrol").change(function (e) {
        let id = $(this).data("id");
        if(this.checked) {
                $.ajax({
                    url:"ajax/menu_durum.php",
                    type:"POST",
                    data: {
                        id_onay: id,
                    },
                    success:function (data) {
                        console.log(data);
                    }
                });
        }else{
            $.ajax({
                url:"ajax/menu_durum.php",
                type:"POST",
                data: {
                    id_red: id,
                },
                success:function (data) {
                    console.log(data);
                }
            });
        }
    });

    $(".duzenle").click(function () {

       let menu_ad = $(this).parents("tr").find(".islem_ad").text();
       let menu_link= $(this).parents("tr").find(".islem_link").text();
       let id = $(this).parents("tr").find(".islem_id").text();

        $(".hidden_id").val(id);

        $("#duzenle_ad").val(menu_ad);
        $("#duzenle_link").val(menu_link);
    });

    $( "#sortable" ).sortable({
        axis: "y",
        update: function( event, ui ) {
            const sortedIDs = $(this).sortable( "toArray" );

            $.ajax({
                url:"ajax/menu_sirala.php",
                data:{
                    sira_dizi:sortedIDs
                },
                type:"POST",
                success:function (data) {
                    window.location.reload();
                }
            })

        }
    });
</script>


</body>

</html>

