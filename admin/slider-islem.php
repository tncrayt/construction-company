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
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.1/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.1/cropper.min.js"></script>
    <style>
        #crop {
            display: block;

            /* This rule is very important, please don't ignore this */
            max-width: 100%;
        }
    </style>


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
                    <h1 class="h3 mb-4 text-gray-800">Slider İşlemleri</h1>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#ekle">Ekle</button>
                </div>


                <div>
                    <?php
                    $query= $pdo->query("SELECT * FROM slider");
                    $data=$query->fetchAll();
                   $say=1;
                    ?>


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Resim</th>
                            <th scope="col">Açıklama</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $slider): ?>
                        <tr>
                            <td><?php echo $say++?></td>
                            <td class="d-none slider_id"><?php echo $slider["id"]; ?></td>
                            <td class="baslik"><?php echo $slider["baslik"]; ?></td>
                            <td>
                                <img  src="<?php echo "../".$slider["resim"]; ?>" data-fancybox class="img-thumbnail resim" style="height: 100px;width: 100px;object-fit: cover" alt="">
                            </td>
                            <td class="aciklama"><?php echo $slider["aciklama"]; ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="onay_kontrol" data-id="<?php echo $slider["id"]; ?>" <?php echo $slider["durum"]==1 ? "checked" : null ?>>
                                    <span class="slider"></span>
                                </label>
                            </td>
                            <td>
                                <a href="<?php echo "ajax/slider_sil.php?id=".$slider["id"]; ?>" class="btn btn-danger">Sil</a>
                                <button class="btn btn-warning düzenle_btn" data-toggle="modal" data-target="#düzenle">Düzenle</button>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Slider Ekle</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ajax/slider_kaydet.php" method="post" enctype="multipart/form-data">

                    <span>Başlık</span>
                    <input type="text" id="slider_baslik" class="w-100 p-2 mb-2" name="baslik" placeholder="Başlık giriniz...">

                    <span>Resim</span>

<!--                    <div>-->
<!--                        <img src="" alt="" id="crop">-->
<!--                        <input type="file" class="form-control" onchange="loadFile(event)">-->
<!--                    </div>-->



                    <div class="card">
                        <img src="#" class="img-thumbnail" id="resim_goster"   data-fancybox="gallery" style="height: 150px;width: 150px;object-fit: cover">
                        <input type="file" id="slider_resim" accept="image/*"  class="w-100 p-2 mb-2" name="resim"  >
                    </div>

                    <span>Açıklama</span>
                    <div class="my-3">
                        <textarea name="icerik" id="text_cevap" class="w-100"  rows="5">Açıklama giriniz....</textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                <input type="submit" class="btn btn-success" value="Gönder">
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade close_pass" id="düzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Slider Ekle</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ajax/slider_guncelle.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="slider_id" class="s_id">
                    <span>Başlık</span>
                    <input type="text"  id="slider_baslik" class="w-100 p-2 mb-2 d-baslik" name="baslik" placeholder="Başlık giriniz...">

                    <span>Resim</span>

                    <div class="card">
                        <img src="#" class="img-thumbnail d-resim" id="resim_goster1"   data-fancybox style="height: 150px;width: 150px;object-fit: cover">
                        <input type="file" id="slider_resim1" accept="image/*"  class="w-100 p-2 mb-2" name="resim"  >
                    </div>

                    <span>Açıklama</span>
                    <div class="my-3">
                        <textarea name="icerik" id="text_cevap" class="w-100 d-aciklama"  rows="5">Açıklama giriniz....</textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">İptal</button>
                <input type="submit" class="btn btn-success" value="Güncelle">
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

    $("#slider_resim1").change(function (e) {
        let input = e.target;
        const reader = new FileReader();

        reader.onload = function () {
            const dataURL = reader.result;

            $("#resim_goster1").attr("src",dataURL);
        }
        reader.readAsDataURL(input.files[0]);

    });

    $(".onay_kontrol").change(function (e) {
        let id = $(this).data("id");
        if(this.checked) {
            $.ajax({
                url:"ajax/slider_durum.php",
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
                url:"ajax/slider_durum.php",
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

    $(".düzenle_btn").click(function () {
        let baslik = $(this).parents("tr").find(".baslik").text();
        let resim = $(this).parents("tr").find(".resim").attr("src");
        let acıklama =$(this).parents("tr").find(".aciklama").text();
        let id = $(this).parents("tr").find(".slider_id").text();


        $(".d-baslik").val(baslik);
        $(".d-resim").attr("src",resim);
        $(".d-aciklama").val(acıklama);
        $(".s_id").val(id);


    });

    const image = document.getElementById('crop');




    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('crop');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
        setTimeout(initCropper, 1000);
    };

    function initCropper(){
        const cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            crop(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);

            },
            autoCropArea: 0.7,
            viewMode: 1,
            center: true,
            dragMode: 'move',
            movable: true,
            scalable: true,
            guides: true,
            zoomOnWheel: true,
            cropBoxMovable: true,
            wheelZoomRatio: 0.1,
            ready: function () {
                //Should set crop box data first here
                console.log("Tets")

            }
        });
    }


</script>


</body>

</html>

