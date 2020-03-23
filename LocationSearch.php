<?php
$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
$where =$_GET["where"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Set the active mySQL database
$dbs = Connection::connect(); 
// Search the rows in the markers table
$sql = "SELECT id, name, address, lat, lng, ( 6371 * acos( cos( radians('$center_lat') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$center_lng') ) + sin( radians('$center_lat') ) * sin( radians( lat ) ) ) ) AS distance FROM shop HAVING distance < '$radius' ORDER BY distance LIMIT 0,20";
$result = $dbs->query($sql);

$res=array();
while ($rows= mysqli_fetch_array($result)){
    array_push($res,$rows);
}

if (!$result) {
  die("Invalid query: " . mysqli_error($dbs));
}

 $_SESSION["shops"] =$res;
 $msg="done";
 echo json_encode(array("code" => "200", "msg" => $msg ));   



