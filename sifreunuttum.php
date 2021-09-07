<?php

ob_start();
session_start();


include_once 'fonksiyon.php';

include_once 'database.php';


$girisim = new arayuzanasayfa();


?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>ARAYÜZ</title>
</head>
<body>
<?php

$gelen = md5(sha1(md5(rand())));


//$giris=$db->prepare("SELECT * FROM kullanici");

//$giris->execute();

//$girisson=$giris->fetch(PDO::FETCH_ASSOC);

//while($gelenler = $giris->fetch(PDO::FETCH_ASSOC)):

//  echo $gelenler["kulad"];

//endwhile;


?>

<?php


switch(@$_GET["sifre"]):

    case "sifreyenile";

        $girisim->sifreyenile($db);

        break;

    case "yenisifre";

        $girisim->yenisifre($db);

        break;

endswitch;



?>
</body>
</html>










