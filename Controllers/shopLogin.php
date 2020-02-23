<?php
$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$shop=$_POST['shop'];
$pw=$_POST['pw'];

$dbs = Connection::connect();     
$sql = "SELECT * FROM buyer WHERE Uid = '$id'";
$result = mysqli_query($dbs,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
