<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_SESSION["shopId"];
$isbn=$_POST['isbn'];
$quentity=$_POST['quentity'];
$price=$_POST['price'];

 $dbs = Connection::connect();
 
      try{
           $sql = "UPDATE shop_books SET quantity='$quentity',price='$price' WHERE isbn='$isbn' AND shopId='$id'";
           $dbs->query($sql);
          echo json_encode(array("code" => "200")); 
         } catch (Exception $ex) {
             return $ex;
         }
         