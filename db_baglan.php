<?php
try {
     $DB = new PDO(
     	"mysql:host=localhost;
dbname=obs_ankara", 
     	"root", ""
     );
     $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception){
        die("Veritabanına bağlantı kurulamadı: " . $exception->getMessage());
}
?>