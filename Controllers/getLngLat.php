<?php

  $address =$_POST['address']; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyAO4dxoeUInCf3G8HaAr8gPwbD-o9YX46I');
  //var_dump($geocode);  die();
  
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
    
  if($longitude!= null){
    echo json_encode(array("code" => "200", "long" => $longitude ,"lati" => $latitude));   
  }else{
    echo json_encode(array("code" => "300"));  
  }
