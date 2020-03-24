<?php
$host    = "localhost";
$pass    = "";
$user    = "root";
$db_name = "book_shelf";
$conn    = new mysqli($host, $user, $pass, $db_name);
if ($conn) {
	echo "establish";
}
?>