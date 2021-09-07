<?php 

ob_start();
session_start();

include_once '../database.php';

$db = new PDO("mysql:host=localhost;dbname=depo;charset=utf8","root","");

include_once 'fonksiyon.php';

$girisim = new yetkiler();


?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Yönetim Paneli</title>
</head>
<body>

 <div class="container text-center">

 	<div class="row text-center">

		<div class="col-xl-4 col-lg-4 col-md-4 text-center mx-auto mt-5">

            <h3>Yönetim Paneli</h3>

            <div class="row text-center mx-auto bg-light border p-2">
                    <?php $girisim->giriskontrol($db); ?>
            </div>

		</div>
	
	</div>

 </div>

	<?php 


switch(@$_GET["sifre"]):

case "sifreyenile";

$girisim->sifreyenile($db);

break;

endswitch;



?>
</body>
</html>










