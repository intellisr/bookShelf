<?php 
include 'db.php';
  
     
       $mark=$_POST['mark'];
       $gamelevel=$_POST['level'];
       $userid=1;
   

try{
$err=0;

    mysqli_begin_transaction($con);

    if (!$con ->query("INSERT INTO `pz_gameplay`(`user_id`, `Game_Level`, `Mark`) VALUES ($userid,'$gamelevel',$mark)"))
      { 
           // echo("Error : " . $con -> error);
      
            $err++;
         
         
    }
 
    if (!$con ->query("INSERT INTO pz_mark(`user_id`,`total_point`,`point_balance`)VALUES($userid,$mark,$mark) ON DUPLICATE KEY UPDATE point_balance=point_balance+$mark,total_point=total_point+$mark")) {
      
       // echo("Error : " . $con -> error);
      
        $err++;
         
    
      }

      if($err==0)
      {
        mysqli_commit($con);
        echo json_encode(array("1"));
       }
       else{
        echo json_encode(array("You Already played this Level.Please Try another Level "));
     
       }
       

   
     } catch (Exceptio $e) {
       
        echo json_encode(array("Fail"));
     } 
	 mysqli_close($con);
 

?>