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
$sql = "SELECT s.id, s.name, s.address, s.lat, s.lng, b.isbn, b.name AS bookName, b.price, b.author, b.cover, ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( s.lat ) ) * cos( radians( s.lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( s.lat ) ) ) ) AS distance FROM shop_books b LEFT JOIN shop s ON b.shopId = s.id  WHERE b.name LIKE '$where' HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";
}else if($type == 2){
$sql = "SELECT s.id, s.name, s.address, s.lat, s.lng, b.isbn, b.name AS bookName, b.price, b.author, b.cover,  ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( s.lat ) ) * cos( radians( s.lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( s.lat ) ) ) ) AS distance FROM shop_books b LEFT JOIN shop s ON b.shopId = s.id  WHERE b.isbn = '$where' HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";    
}else{
$sql = "SELECT s.id, s.name, s.address, s.lat, s.lng, b.isbn, b.name AS bookName, b.price, b.author, b.cover,  ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( s.lat ) ) * cos( radians( s.lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( s.lat ) ) ) ) AS distance FROM shop_books b LEFT JOIN shop s ON b.shopId = s.id  WHERE b.cover_text = '$where' HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";    
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
 $_SESSION["imgText"]= null;
 $_SESSION["shops"] =$res;
 $msg="done";
 echo json_encode(array("code" => "200", "msg" => $msg ));   



