<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$id=$_POST['Uid'];
$name=$_POST['Uname'];
$imgUrl=$_POST['Uimg'];
$email=$_POST['Uemail'];

$dbs = Connection::connect();     
$sql = "SELECT * FROM buyer WHERE Uid = '$id'";
$result = mysqli_query($dbs,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row != null){    
        $_SESSION["userId"] = $id;
        $_SESSION["userName"] = $name;
        $_SESSION["userImg"] = $imgUrl;
        $_SESSION["userEmail"] = $email;
        $msg="logedIn";
        echo json_encode(array("code" => "200", "msg" => $msg ));       
}else{
      try{
            $sql= "INSERT INTO buyer(Uid, Uname) VALUES ('$id','$name')";
            $dbs->query($sql);
        }
        catch (Exception $ex){
            echo $ex;
        }
        
        $_SESSION["userId"] = $id;
        $_SESSION["userName"] = $name;
        $_SESSION["userImg"] = $imgUrl;
        $_SESSION["userEmail"] = $email;
        
        echo json_encode(array("code" => "200", "msg" => $msg ));    
}
      
ob_end_flush();