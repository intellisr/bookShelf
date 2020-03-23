<?php

$root=$_SERVER['DOCUMENT_ROOT'];
include("$root/bookShelf/Models/Connection.php");

class common {
  
    public static function getbooks(){
      $dbs = Connection::connect();  
      $shopId = $_SESSION['shopId'];
      
      $sql = "SELECT * FROM shop_books WHERE shopId = '$shopId'";
      $result = mysqli_query($dbs,$sql);

      return $result;
    }
    
    public static function getbooksMy(){
      $dbs = Connection::connect();  
      $Id = $_SESSION['userId'];
      
      $sql = "SELECT * FROM user_books WHERE user_id = '$Id'";
      $result = mysqli_query($dbs,$sql);

      return $result;
    }
    
}