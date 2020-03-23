<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_SESSION["userId"];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$address=$_POST['address'];

 $dbs = Connection::connect();   
 
      try{
            $sql = "UPDATE buyer SET lat='$latitude',lng='$longitude',address='$address' WHERE Uid='$id'";
            $dbs->query($sql);
         } catch (Exception $ex) {
             return $ex;
         }
         
header("Location:../userMain.php");         