<?php
$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
$dbs = Connection::connect();     


$text=$_POST['text'];
$type=$_POST['type'];


if($type == 1){
    
    $stat="%".$text."%";
    echo json_encode(array("code" => "200", "msg" => $stat )); 
    
}else if($type == 2){
    
    $stat=$text;
    echo json_encode(array("code" => "200", "msg" => $stat )); 
    
}else{
    
}   

