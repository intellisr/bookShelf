<?php
include 'db.php';
$query = "SELECT * FROM chat ORDER BY id ";
$run   = $conn->query($query);
while ($row = $run->fetch_array()):
?>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        $myid = $_SESSION["userName"];
?>
<div id="chat_data">
<?php if($row['name'] != $myid){?>
    <div style="width:50%;float:left"> 				<span style="color:green;"><h5><?php echo $row['name'];
?>:</h5></span>
				<span style="color:blueviolet;"><?php echo $row['msg'];
?></span>
				<span style=""><?php echo $row['date'];
?></span>
        </br>
</div>
<?php } else{ ?>
    
<div style="overflow:hidden;float:right">
                                <span style="color:blue;"><h5><?php echo $row['name'];
?>:</h5></span>
				<span style="color:brown;"><?php echo $row['msg'];
?></span>
				<span style=""><?php echo $row['date'];
?></span>
    
</div>
    </br>
<?php } ?>
			</div>
<?php endwhile;?>