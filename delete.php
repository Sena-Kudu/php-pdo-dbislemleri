<?php
    include 'db_baglan.php';

    if(!isset($_GET['id'])){
        die("HATA: ID Değeri yok!");
    }

    $SORGU= $DB->prepare("DELETE FROM ogrenci WHERE id=:id");

    $SORGU->bindParam(":id" , $_GET["id"]);

    $SORGU->execute();
    echo "<h1>Silme başarılı !</h1>";
    echo "<p>3 saniye içinde Ana Sayfaya yönleneceksiniz...</p>";
    
    // İşlem tamam. 3sn bekleyip, Ana sayfaya yönlendirelim.
    header("Refresh:3; url=index.php");
    die();

?>