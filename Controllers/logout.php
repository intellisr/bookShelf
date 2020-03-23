<?php
session_start();
$_SESSION["userId"] = null;
$_SESSION["userName"] = null;
$_SESSION["userImg"] = null;
$_SESSION["userEmail"] = null;
$_SESSION["shopName"] = null;
$_SESSION["shopId"] = null;
$_SESSION["shops"] = null;
$_SESSION["lat"] = null;
$_SESSION["lng"] = null;

header("Location: ../index.php");