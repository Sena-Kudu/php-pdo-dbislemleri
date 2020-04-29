    <?php
    include 'db_baglan.php';
    

    if(isset($_POST['submit'])){

            // Sorguyu hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO ogrenci(adisoyadi, numara, bolum)
            VALUES (:adisoyadi,:numara,:bolum)");
        $SORGU->bindParam(":adisoyadi", $_POST["adisoyadi"]);
        $SORGU->bindParam(":numara",  $_POST["numara"]);
        $SORGU->bindParam(":bolum",    $_POST["bolum"]);
            // SQL Sorgumuzu çalıştıralım
        $SORGU->execute();

            // Son eklenen kaydın kayıt numarasını alalım
        $YeniKayitID = $DB->lastInsertId();

        

    }

/*if(isset($_POST['submit'])){
//echo"burda";
    print_r($_POST['submit']);

}*/


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>kisi ekle</title>
</head>
<body>
    <h1>Yeni kisi</h1>
    <form method="POST" action="form_val.php">
        <div class="container">
          <div class="row">
            <div class="col">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">adisoyadi</span>
                </div>
                <input type="text" class="form-control"  name="adisoyadi" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required="required"> <br>
                <?php if(isset($error_name)) {
                 
                   ?>
                   <p> <?php echo $error_name ?></p>
               <?php } ?>
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">numara</span>

            </div>
            <input type="text" class="form-control" name="numara" required="required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <br>
            <?php if(isset($error_num)) {
             

               ?>
               <p> <?php echo $error_num ?></p>
           <?php } ?>
       </div>

       <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">bolum</span>
        </div>
        <input type="text" class="form-control" name="bolum" required="required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <br> <br>
        <?php if(isset($error_dep)) {
         
           ?>
           
           


           <p> <?php echo $error_dep ?></p>
           
       <?php } ?>
   </div>
   <div>
       <input type="submit" name="submit" class="btn btn-success" value="Yeni Kişiyi Kaydet" />
   </div>

</div>


<div class="col">
 <div class="alert alert-danger" role="alert">
  A simple danger alert—check it out!
</div>
</div>

</div>
</div>

</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>