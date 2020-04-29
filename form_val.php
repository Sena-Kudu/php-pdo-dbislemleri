<?php

$username= $_POST['adisoyadi'];
$number= $_POST['numara'];
$department= $_POST['bolum'];

 if(strlen($username) < 6){

 	$error_name=  'please enter your name';
 }
  if(empty($number)){

 	$error_num=  'please enter your number';
 	
 }
   if(empty($department)){

 	$error_dep=  'please enter your department';
 	
 }



include('create.php');
header("Refresh:3; url=index.php");
?>