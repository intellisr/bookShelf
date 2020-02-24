<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$shop=$_POST['shop'];
$pw=$_POST['pw'];
 
$dbs = Connection::connect();     
$sql = "SELECT * FROM buyer WHERE name = '$shop' and password = '$pw'";
$result = mysqli_query($dbs,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row != null){       
    $msg="shopLogged";
   
    echo json_encode(array("code" => "200", "msg" => $msg ));
    
}else{
       
    $msg="goRegister";
     echo json_encode(array("code" => "300", "msg" => $msg ));
}

      
