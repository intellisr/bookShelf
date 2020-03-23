
<?php
$root=$_SERVER['DOCUMENT_ROOT'];

require_once __DIR__ . '/vendor/autoload.php';
use thiagoalessio\TesseractOCR\TesseractOCR;

$target_dir = "/bookShelf/covers/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$loc=$root.$target_dir;

shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "A:\\SOFTWARE\\xampp\\htdocs\\bookShelf\\covers\\'.$_FILES["image"]["name"].'" out');

$myfile = fopen("out.txt", "r") or die("Unable to open file!");
$text=fread($myfile,filesize("out.txt"));
fclose($myfile);

echo $text;

if($text == ""){
    
}else{
    
}













