<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$shopid=$_POST['sid'];
$itemid=$_POST['bid'];
$userid=$_SESSION["userId"];

$dbs = Connection::connect();     
$sql= "INSERT INTO mycart (user_id,item_id,shop_id,status) VALUES ('$userid','$itemid,'$shopid','new')";
$dbs->query($sql);
var_dump($userid);