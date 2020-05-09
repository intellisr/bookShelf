<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="styles.css">
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../resources/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="resources/chatRoom/style.css">
        
	<script type="text/javascript">
		function ajax(){
		var req=new XMLHttpRequest();
		req.onreadystatechange=function(){
		if(req.readyState==4 && req.status==200){
		document.getElementById('chat').innerHTML=req.responseText;

	}

	}
	req.open('GET','chat.php',true);
	req.send();


	}
	setInterval(function(){ajax()},1000);

	</script>
</head>
<body onload="ajax()">
     <div id="header" class="container">         
          <div class="row">
            
          <!--Start of Header Left-->
            <div id="header-left" class="col-md-4 col-sm-4 hidden-xs">
              <a href="#" title="Home | Chat"><img class="img-responsive" src="../resources/images/logo_dark.png" alt="BookStore Logo"></a>
            </div>
          <!--End of Header Left-->

          <!--Start of Header Right/Navigation-->
            <nav id="header-right" class="navbar navbar-default col-md-8 col-sm-8" role="navigation">
            <div class="row">
    
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar icon-bar1"></span>
                <span class="icon-bar icon-bar2"></span>
                <span class="icon-bar icon-bar3"></span>
                </button>
                <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#" title="Home | BookStore"><img src="../resources/images/dimensions-it-logo-mini.png" alt="Dimensions IT Logo"></a>
              </div>
                
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="../userMain.php">Home </a></li>
                    <li ><a href="../shareBooks.php">Share Books</a></li>
                    <li ><a href="../indexg.php">Puzzle</a></li>
                    <li class="active"><a href="#">Chat Room</a></li>                                     
                </ul>
              </div>

          </div>
        </nav>

          </div>
        </div>
    <?php
        session_start();
        $myid = $_SESSION["userName"];
      ?>
    <div id="container" class="container" style="margin-top:100px;">
	<div id="chat_box">
		<div id="chat">
		</div>

	</div>
		<form method="post" action="index.php">
			<textarea name="msg" placeholder="Enter the meassage:)"></textarea>
			<input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Sendit">
		</form>
<?php
if (isset($_POST['submit'])) {
	$name  = $myid;
	$msg   = $_POST['msg'];
	$query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
	$run   = $conn->query($query);
	if ($run) {
		echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
	}

}
?>
</div>

</body>
</html>
