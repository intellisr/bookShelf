
<?php
$root=$_SERVER['DOCUMENT_ROOT'];
session_start();

$target_dir = "/bookShelf/covers/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$loc=$root.$target_dir;

shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "A:\\xampp\\htdocs\\bookShelf\\covers\\'.$_FILES["image"]["name"].'" out');

$myfile = fopen("out.txt", "r") or die("Unable to open file!");
$text=fread($myfile,filesize("out.txt"));
fclose($myfile);

if($text == ""){
   $_SESSION["imgText"] ="wrong";
   header("Location:userMain.php");
}else{
   $_SESSION["imgText"] = $text;
   header("Location:userMain.php");
}













