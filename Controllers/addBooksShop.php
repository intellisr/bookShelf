<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_SESSION["shopId"]; 
$name=$_POST['name'];
$isbn=$_POST['isbn'];
$author=$_POST['author'];
$price=$_POST['price'];
$quan=$_POST['quantity'];

 $dbs = Connection::connect();
 
      try{
           $sql = "INSERT INTO shop_books (isbn,name,author,price,shopId,quantity)"
             . "values ('$isbn', '$name', '$author','$price','$id','$quan')";
            $dbs->query($sql);
         } catch (Exception $ex) {
             return $ex;
         }
         
header("Location:../shopMain.php");