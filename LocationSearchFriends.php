<?php
$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
$where =$_GET["where"];
$type=$_GET["type"];

// Set the active mySQL database
$dbs = Connection::connect(); 
// Search the rows in the markers table
if($type == 1){
$sql = "SELECT  s.proPic,s.Uname, s.lat, s.lng, b.isbn, b.name AS bookName, b.price, b.author, ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( s.lat ) ) * cos( radians( s.lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( s.lat ) ) ) ) AS distance FROM user_books b LEFT JOIN buyer s ON b.user_id = s.Uid  WHERE b.name LIKE '$where' HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";
}else if($type == 2){
$sql = "SELECT  s.proPic,s.Uname, s.lat, s.lng, b.isbn, b.name AS bookName, b.price, b.author,  ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( s.lat ) ) * cos( radians( s.lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( s.lat ) ) ) ) AS distance FROM user_books b LEFT JOIN buyer s ON b.user_id = s.Uid  WHERE b.isbn = '$where' HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";    
}
$result = $dbs->query($sql);

$res=array();
while ($rows= mysqli_fetch_array($result)){
    array_push($res,$rows);
}

if (!$result) {
  die("Invalid query: " . mysqli_error($dbs));
}

//var_dump($sql);
//print_r($res);

 $_SESSION["friend"] =$res;
 $msg="done";
 echo json_encode(array("code" => "200", "msg" => $msg ));   



