<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$isbn=$_POST['isbn'];
$id=$_SESSION["shopId"];

$dbs = Connection::connect();
 
      try{
           $sql = "DELETE FROM shop_books WHERE isbn='$isbn' AND shopId='$id'";
            $dbs->query($sql);
            echo json_encode(array("code" => "200")); 
         } catch (Exception $ex) {
             return $ex;
         }
         