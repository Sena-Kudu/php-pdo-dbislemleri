<?php
include 'db_baglan.php';
if(!isset($_GET['id'])){
	die("HATA: ID değeri yok!");
}

$SORGU = $DB->prepare("SELECT * FROM ogrenci WHERE id = :id");

$SORGU->bindParam(":id", $_GET['id']);
$SORGU->execute();
if($SORGU->rowCount() == 0){
	die("HATA : Böyle bir kayıt bulunamadı");
}else{
	$KAYIT = $SORGU->fetch();
}

if(isset($_POST['adisoyadi'])){
	$SORGU = $DB->prepare("UPDATE ogrenci SET adisoyadi=:adisoyadi,numara=:numara,bolum=:bolum WHERE id=:id");
	$SORGU->bindParam(":adisoyadi", $_POST["adisoyadi"]);
	$SORGU->bindParam(":numara"   , $_POST["numara"]);
	$SORGU->bindParam(":bolum"    , $_POST["bolum"]);

	$SORGU->bindParam(":id", $_GET["id"]);

	$SORGU->execute();

	echo "<h1>Güncelleme başarılı !</h1>";
	echo "<p>3 saniye içinde Ana Sayfaya yönleneceksiniz...</p>";

        // İşlem tamam. 3sn bekleyip, Ana sayfaya yönlendirelim.
	header("Refresh:3; url=index.php");
	die();

}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>kisi ekle</title>
</head>
<body>
	<h1>Güncelle</h1>
	<form method="POST" >
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">adisoyadi</span>
						</div>
						<input type="text" class="form-control"  name="adisoyadi" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required="required"> <br>

					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">numara</span>

						</div>
						<input type="text" class="form-control" name="numara" required="required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <br>

					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">bolum</span>
						</div>
						<input type="text" class="form-control" name="bolum" required="required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <br> <br>

					</div>
					<div>
						<input type="submit" name="submit" class="btn btn-success" value="Güncellemeyi Kaydet" />
					</div>

				</div>



			</div>

		</div>
	</div>

</form>

</body>
</html>