<?php

ob_start();
session_start();

include_once 'database.php';

include_once 'fonksiyon.php';

$db = new PDO("mysql:host=localhost;dbname=depo;charset=utf8","root","");

$arayuzana = new arayuzanasayfa();


?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ARAYÜZ</title>


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="control.php?arayuz=anasayfa">ANASAYFA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="control.php?arayuz=anasayfa">Kategoriler <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="control.php?arayuz=urunler">Ürünler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="yonetim/index.php">Panel</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-danger" href="control.php?arayuz=kullanicigiris">Giriş </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link text-danger" href="control.php?arayuz=cikis">Çıkış </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link text-danger" href="control.php?islem=kategoriliste">Sepet <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item active">
                    <span>Hoş Geldin</span>
                </li>

            </ul>
        </div>


    </nav>


    <hr>

<?php

if(isset($_SESSION["mailim"])):

switch ($_GET["arayuz"]):

    case "anasayfa";

    $arayuzana->gelanasayfa($db);

    break;

    case "gelenurunler";

        $arayuzana->gelanurun($db);

    break;

    case "onecikan";

        $arayuzana->onecikan($db);

        break;

    case "kullanicigiris";

        $arayuzana->kullanicigiris($db);

        break;

    case "cikis";

        session_destroy();

        echo '<div class="col-xl-12 col-lg-12 col-md-12 mx-auto"><div class="alert alert-danger">Çıkış Yapılıyor</div></div>';

        header("refresh:2,url=index.php");

        break;

endswitch;

else:

    header("Location: index.php");

endif;

?>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>
</html>

