<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");
session_start();

$target_dir = "/bookShelf/covers/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$loc=$root.$target_dir;
shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "A:\\xampp\\htdocs\\bookShelf\\covers\\'.$_FILES["image"]["name"].'" img');
$myfile = fopen("img.txt", "r") or die("Unable to open file!");
$text=fread($myfile,filesize("img.txt"));
fclose($myfile);

if($text == null || $text == "" ){
  $text="no ocr support";
  echo json_encode(array("code" => "300")); 
}

$imageFile = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$id=$_SESSION["shopId"]; 
$name=$_POST['name'];
$isbn=$_POST['isbn'];
$author=$_POST['author'];
$price=$_POST['price'];
$quan=$_POST['quantity'];

 $dbs = Connection::connect();
 
      try{
           $sql = "INSERT INTO shop_books (isbn,name,author,price,shopId,quantity,cover_text,cover)"
             . "values ('$isbn', '$name', '$author','$price','$id','$quan','$text','$imageFile')";
            $dbs->query($sql);
            echo json_encode(array("code" => "200")); 
         } catch (Exception $ex) {
             return $ex;
             echo json_encode(array("code" => "400")); 
         }
         
header("Location:shopMain.php");