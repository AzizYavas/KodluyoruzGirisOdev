<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

include_once 'database.php';

class arayuzanasayfa{


    function gelanasayfa($arayuzanasayfa){



        //SELECT kategoriler.kategoriad,urunler.adi FROM kategoriler INNER JOIN urunler ON kategoriler.idkategori=urunler.idkategori

        $anakategori = $arayuzanasayfa->prepare("SELECT * FROM kategoriler");

        if($anakategori->execute()):


        ?>


        <div class="container">
            <div class="row">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item"><a href="control.php?arayuz=onecikan">ÖNE ÇIKANLAR</a></li>
                    <?php

                        while($anakategorison=$anakategori->fetch(PDO::FETCH_ASSOC)):

                    ?>
                    <li class="list-group-item"><a href="control.php?arayuz=gelenurunler&id=<?php echo $anakategorison["idkategori"]; ?>"><?php echo $anakategorison["kategoriad"]; ?></a></li>
                    <?php

                        endwhile;

                        endif;

                    ?>
                </ol>
            </div>
        </div>

        <?php

    }

    function gelanurun($gelenurundb){

        if (isset($_GET["id"]))

        $anakategori = $gelenurundb->prepare("SELECT kategoriler.kategoriad,urunler.adi FROM kategoriler INNER JOIN urunler ON kategoriler.idkategori=urunler.idkategori WHERE kategoriler.idkategori=".$_GET["id"]);

        if($anakategori->execute()):


            ?>

            <div class="container">
            <div class="row">
            <ol class="list-group list-group-numbered">
            <?php

            while($anakategorison=$anakategori->fetch(PDO::FETCH_ASSOC)):

            ?>
                <li class="list-group-item">
                    <a href=""><?php echo $anakategorison["adi"]; ?></a>
                </li>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <input class="btn btn-danger" type="submit" value="Sepete Ekle">
                </div>

            <?php

            endwhile;

        endif;

        ?>
        </ol>
        </div>
        </div>

        <?php

    }

    function onecikan($dbonecikan){

        $gelenonecikan = $dbonecikan->prepare("select * from urunler where onecikar=1");

        $gelenonecikan->execute();

        ?>

        <div class="container">
            <div class="row">
                <form action="">
                    <?php
                    while($gelenurunlerson = $gelenonecikan->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <span><?php echo $gelenurunlerson["adi"]; ?></span><br>
                        <input type="submit" class="btn btn-danger" name="ekle" value="Sepete Ekle"><br>
                    <?php
                    endwhile;
                    ?>
                </form>
            </div>
        </div>

        <?php


    }



    function kullanicigiris($yonetimgirisdb){


        if($_POST):

            //burada rand vardı sildim

            $mail=$_POST["mail"];
            $sifre=$_POST["sifre"];

            if(empty($mail) || empty($sifre)):

                echo '<div class="col-xl-12 col-lg-12 col-md-12 mx-auto"><div class="alert alert-danger">BOŞ YER KALAMAZ !!! </div></div>';
                header("refresh:2,url=index.php");

            else:

                $sifregetir=$yonetimgirisdb->prepare("SELECT * FROM site_kullanici where mail=:mail");
                $sifregetir->bindParam(":mail",$mail);
                $sifregetir->execute();
                $sifregetirson=$sifregetir->fetch(PDO::FETCH_ASSOC);

                    if($sifregetirson["sifre"]==md5(sha1(md5($_POST["sifre"]))) && $sifregetirson["mail"]==$mail):

                        $_SESSION["mailim"]=$mail;
                        $_SESSION["sifre"]=$sifre;

                            echo '<div class="col-xl-12 col-lg-12 col-md-12 mx-auto"><div class="alert alert-success">Hoş geldiniz </div></div>';
                            header("refresh:2,url=control.php?arayuz=anasayfa");

                    else:

                        echo '<div class="col-xl-12 col-lg-12 col-md-12 mx-auto"><div class="alert alert-danger">BÖYLE BİR KULLANICI YOK !!! </div></div>';
                        //header("refresh:2,url=sifreunuttum.php?sifre=sifreyenile&id=");
                    endif;

            endif;

            else:


            ?>
            <!-- //todo giriş yapamadım bir bak  -->
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                <form class="user" action="" method="POST">
                    <div class="form-group">
                        <input type="email"  class="form-control form-control-user" name="mail" placeholder="Kullanıcı Adınız...">
                    </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="sifre"  placeholder="Şifreniz....">
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="GİRİŞ">
                <input type="hidden" name="girisid" value="<?php echo $_GET["id"]; ?>">
                <a href="sifreunuttum.php?sifre=sifreyenile">Şifremi Unuttum</a>
            </div>

            </form>

        </div>


        <?php

        endif;


    }


    function sifreyenile($sifreyeniledb){

        if (isset($_POST["mailgonder"])):

            $gondermail = $_POST["mail"];

            $idgetir = $sifreyeniledb->prepare("select id from site_kullanici where mail=:mail");
            $idgetir->bindParam(":mail",$_POST["mail"]);
            $idgetir->execute();
            $idgetirson = $idgetir->fetch(PDO::FETCH_ASSOC);

            $mail = new PHPMailer(true);

            $mail->SMTPDebug=0; // HATA İŞLEVİNİ GÖSTERİR
            $mail->isSMTP(); // SMTP PROTOKOLÜNE GÖRE AYARLADIK
            $mail->CharSet = 'UTF-8';

            // ANA AYARLAR
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true; // SMTP KİMLİK DOĞRULAMASINI ETKİNLEŞTİRİR
            $mail->Username = "azizyavas452272@gmail.com";
            $mail->Password = "584512199507a.";
            $mail->SMTPSecure = 'tsl'; // tls şifrelemesini etkinleştirir sll de kabul eder
            $mail->Port = 587; // GMAİL EVRENSEL PORTU

            //MAİL GÖNDERİCİ AYARLARI
            $mail->setFrom($gondermail,"Aziz Yavas"); // GÖNDEREN KİM
            $mail->addAddress($gondermail,"aziz yavas"); // burası opsiyonel çoklu mail için
            $mail->addReplyTo( $gondermail,"Aziz Yavas"); // CEVAPLAYA BASINCA HANGİ MAİLE GİTSİN

            $mail->isHTML(true); // e posta biçimi html olarak yollanması
            $mail->Subject='FİRMA ADI'; // MAİL KONU


            $mail->Body = "http://localhost/siparis/sifreunuttum.php?sifre=yenisifre&id=".$idgetirson["id"]; // mail içeriği
            $mail->send();

            echo "Mail Gönderildi";

        else:


            ?>

        <div class="container text-center">

    <div class="row text-center">

        <div class="col-xl-4 col-lg-4 col-md-4 text-center mx-auto mt-5">

            <h3>ŞİFREMİ UNUTTUM</h3>

            <div class="row text-center mx-auto bg-light border p-2">

    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
        <form class="user" action="" method="POST">

            <div class="form-group">
                <input type="email"  class="form-control form-control-user" name="mail" placeholder="Kayıtlı E-Posta Adresiniz">
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12">
                <input type="submit" name="mailgonder" class="btn btn-primary btn-user btn-block" value="Gönder">
            </div>

        </form>
    </div>

            </div>

        </div>

    </div>

        </div>


        <?php
    endif;
    }


    function yenisifre($yenisifredb){

        if (isset($_POST["yenisifre"])):

            $kayit = $_POST["kayit"];

            $sifreyenile = $yenisifredb->prepare("update site_kullanici set sifre=:sifre,sifre2=:sifre2 where id=:id");

            $sifreyenile->bindParam(":sifre",md5(sha1(md5($_POST["sifre"]))));
            $sifreyenile->bindParam(":sifre2",md5(sha1(md5($_POST["sifre_tekrar"]))));
            $sifreyenile->bindparam(":id",$kayit);

            if ($sifreyenile->execute()):

                echo "sifre güncellendi";

            else:

                echo "sifre olmadı";

                endif;

        else:

        ?>

        <div class="container text-center">

            <div class="row text-center">

                <div class="col-xl-4 col-lg-4 col-md-4 text-center mx-auto mt-5">

                    <h3>ŞİFREMİ YENİLE</h3>

                    <div class="row text-center mx-auto bg-light border p-2">
                        <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                            <form class="user" action="" method="POST">

                                <div class="form-group">
                                    <input type="text"  class="form-control form-control-user" name="sifre" placeholder="Yeni Şifreniz">
                                </div>

                                <div class="form-group">
                                    <input type="text"  class="form-control form-control-user" name="sifre_tekrar" placeholder="Yeni Şifre Tekrarı">
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <input type="submit" name="yenisifre" class="btn btn-primary btn-user btn-block" value="Gönder">
                                    <input type="hidden" name="kayit" value="<?php echo $_GET["id"]; ?>">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>



       <?php

        endif;

    }





} // class kapanış

?>