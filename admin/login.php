<?php

session_start();
require ("connection.php");

if (isset($_POST["submit"])){

    $kadi = $_POST["kadi"];
    $kpass = md5($_POST["kpass"]);

    $gresponse = $_POST["g-recaptcha-response"];
    $captchaSecretKey = "6LeogfUdAAAAAANKIZYqMHA3__HQN9JKBnK_gm2Q";

    $query=$pdo->prepare("SELECT * FROM admin WHERE admin_kadi = :kadi AND admin_sifre = :kpass");
    $query->execute([
            "kadi"=>$kadi,
        "kpass" => $kpass
    ]);
    $data=$query->fetch();


    $data = array(
        'response' => $gresponse,
        'secret' => $captchaSecretKey
    );
    $curl= curl_init("https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curl,CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION, TRUE);

    $output = curl_exec($curl);

    $onay= json_decode($output,true);



if ($query->rowCount() > 0 && $onay["success"]){
        $_SESSION["login"]= true;
        $_SESSION["giris_tarih"]= date("Y-m-d H:m:s");
        $_SESSION["ip"]= $_SERVER["REMOTE_ADDR"];;
        header("Location:index.php");
    }else{
        header("Location:login.php");
    }

}

?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giriş Yap</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz !</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                        <div class="form-group">
                                            <input type="text" name="kadi" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" required
                                                placeholder="Kullanıcı adını giriniz...">
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" name="kpass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifreniz">
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="6LeogfUdAAAAADEx_-BBHU6i46pwfGUXJ-RBtF1a"></div>


                                        <br>
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Giriş">


                                    </form>

                               
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-login-image border"></div>

                        </div>
                    </div>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>