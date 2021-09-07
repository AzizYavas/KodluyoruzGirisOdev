<?php

ob_start();
session_start();

include_once '../database.php';

include_once 'fonksiyon.php';


$kat= new kategoriler();

$urun= new urunler();

$kulad= new kullanicilar();

$ana= new anasayfa();

$depo= new stokguncelle();

$rapor= new rapor();

$sinir= new stokalarm();

$kasa= new kasa();


?>

<html>
<head>
<meta charset="utf-8">
<title>YÖNETİM</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
  <a class="navbar-brand" href="control.php?islem=anasayfa">ANASAYFA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="control.php?islem=kategoriliste">Kategoriler <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="control.php?islem=listeurun">Ürünler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="control.php?islem=listekulad">Kullanıcılar</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="control.php?islem=stokrapor">Rapor</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="control.php?islem=cikis">Çıkış</a>
      </li>
    </ul>
  </div>
	<p class="font-weight-bold text-danger pr-2 pt-2"> KULLANICI ADI : </p> 
	<p class="font-weight-bold text-secondary pr-2 pt-2"><?php echo $_SESSION["mail"]; ?></p>
	 
	<p class="font-weight-bold text-danger pr-2 pt-2"> KULLANICI YETKİ : </p> 
	
  <p class="font-weight-bold text-secondary pr-2 pt-2"><?php  
  
if($_SESSION["yetki"]==1):

    echo "Yönetici";

    elseif($_SESSION["yetki"]==2):

        echo "Depo Görevlisi";

    else:

        echo "Kasiyer";
endif;
?>
</p>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

        <?php 
        
          $stokalarmsayi = $db->prepare("SELECT count(*) FROM urunler WHERE bildirim = 0"); 
          $stokalarmsayi->execute();  
        
        ?>

    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <?php
            while($stokalarmsayison=$stokalarmsayi->fetch(PDO::FETCH_COLUMN)):
            ?>
                <span class="badge badge-danger badge-counter"><?php echo $stokalarmsayison; ?></span>
            <?php
            endwhile;
            ?>
        </a>
        <?php 
        
        $stokalarm=$db->prepare("SELECT * FROM urunler");
        $stokalarm->execute();
        
        ?>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header font-weight-bold" style="color: red;">
              <b>Stok Alarm</b>
          </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="font-weight-bold">
                  <?php 

                while($stokalarmson=$stokalarm->fetch(PDO::FETCH_ASSOC)):

                  if($stokalarmson["cizgi"]>=$stokalarmson["stok"]): 

                   echo  '<div class="text-truncate"> '.$stokalarmson["adi"].' Ürünü Belirlene Stok Sınırının Altına İndi !  Stok Güncelleyin</div><hr>';

                  endif;

                endwhile;

                    ?> 
                </div>
            </a>
        </div>

    </li>

</nav>


	 
</nav>


<hr>

<?php


    if(isset($_SESSION["mail"])):

            switch(@$_GET["islem"]):

            case "kategoriliste";

            if($_SESSION["yetki"]==1):

            $kat->listekat($db);

            elseif($_SESSION["yetki"]==2):

                $kat->listekat($db);

            else:

                echo "SADECE YÖNETİCİLER VE DEPO GÖREVLİLERİ İÇİN";
                header("refresh:2,url=control.php");

            endif;

            break;

            case "anasayfa";

            $ana->listeanasayfa($db);

            break;

            case "katekle";

            $kat->katekle($db);

            break;

            case "katguncelle";

            $kat->katguncelle($db);

            break;

            case "katsil";

            $kat->katsil($db);

            break;

            case "stokrapor";

            @$rapor->stokrapor($db);

            break;

            case "listeurun";

            $urun->listeurun($db);

            break;

            case "urunekle";

            if($_SESSION["yetki"]==1):

            $urun->urunekle($db);

            elseif($_SESSION["yetki"]==2):

                $urun->urunekle($db);

            else:

                echo "Sadece Yönetici ve Depo görevlisi için";
                header("refresh:2,url=control.php?islem=listeurun");

            endif;

            break;

            case "urunguncelle";

            if($_SESSION["yetki"]==1):

                $urun->urunguncelle($db);

                elseif($_SESSION["yetki"]==2):
                    
                    $urun->urunguncelle($db);
                    
                else:
    
                    echo "Sadece Yönetici ve Depo görevlisi için";
                    header("refresh:2,url=control.php?islem=listeurun");
    
                endif;
                
            break;

            case "urunstokartır";

            if($_SESSION["yetki"]==1):

            $depo->urunstokartır($db);

                elseif($_SESSION["yetki"]==2):

                $depo->urunstokartır($db);

            else:

                echo "Sadece Yönetici ve Depo görevlisi için";
                header("refresh:2,url=control.php?islem=listeurun");

            endif;

            break;

            case "urunstokazalt";

            if($_SESSION["yetki"]==1):
                
            $depo->urunstokazalt($db);

            elseif($_SESSION["yetki"]==2):

                $depo->urunstokazalt($db);

            else:

                echo "Sadece Yönetici ve Depo görevlisi için";
                header("refresh:2,url=control.php?islem=listeurun");

            endif;

            break;

            case "urunsil";

            $urun->urunsil($db);

            break; 
            
            case "listekulad";

            if($_SESSION["yetki"]==1):

            $kulad->listekulad($db);

            else:

                echo "SADECE YÖNETİCİLER İÇİN Yetkiniz Yok !!";
                header("refresh:2,url=control.php");

            endif;

            break;

            case "kuladekle";

            $kulad->kuladekle($db);

            break;

            case "kulguncelle";

            $kulad->kulguncelle($db);

            break;

            case "kulsil";

            $kulad->kulsil($db);

            break;

            case "sifresifirla";

            $kulad->sifresifirla($db);

            break;

            case "stoksinirliste";

            $sinir->stoksinirliste($db);

            break;

            case "stoksınırekle";

            $sinir->stoksınırekle($db);

            break;

            case "stoksınırguncelle";

            $sinir->stoksınırguncelle($db);

            break;



            case "bakiyeartır";

            $kasa->bakiyeartır($db);

            break;

            case "bakiyeazalt";

            $kasa->bakiyeazalt($db);

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

