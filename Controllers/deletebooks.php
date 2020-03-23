<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_SESSION["userId"]; 
$isbn=$_POST['isbn'];


 $dbs = Connection::connect();
 
      try{
           $sql = "DELETE FROM user_books WHERE isbn='$isbn' and user_id='$id'";
            $dbs->query($sql);
         } catch (Exception $ex) {
             return $ex;
         }
         
$msg="done";
echo json_encode(array("code" => "200", "msg" => $msg ));  