<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_SESSION["userId"]; 
$name=$_POST['name'];
$isbn=$_POST['isbn'];
$author=$_POST['author'];
$price=$_POST['price'];

 $dbs = Connection::connect();
 
      try{
           $sql = "INSERT INTO user_books (isbn,name,author,price,user_id)"
             . "values ('$isbn', '$name', '$author','$price','$id')";
            $dbs->query($sql);
         } catch (Exception $ex) {
             return $ex;
         }
         
header("Location:../shareBooks.php");