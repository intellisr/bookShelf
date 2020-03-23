<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$password=$_POST['password'];

 $dbs = Connection::connect();   
 
      try{
            $sql = "INSERT INTO shop (name,address,lat,lng,password,email)"
             . "values ('$name', '$address', '$latitude','$longitude','$password','$email')";
            $dbs->query($sql);
         } catch (Exception $ex) {
             return $ex;
         }
         
header("Location:../index.php");         