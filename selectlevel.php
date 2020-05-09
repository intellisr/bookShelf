<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>puzzle</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
        }
        
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }
        
        .container {
            padding: 2px 16px;
        }
    </style>
</head>
<script>
$(document).ready(function() {

$.ajax({
    type: "POST",
    url: "loadmark.php",
     success: function(result){
        alert(result.['user_id']);
    }
});
});
</script>
<body class="bg-secondary">
    <div align="center" class=" container-fluid ">Hi USERNAME
        <h5>Select level to Play Game</h5>
        <a href="level1.php">
            <div class="card">


                <div class="container bg-dark">

                    <!--  <img src="images/1.jpg" alt="l1" style="width:100%">  -->
                    <h4><b class="text-light">LEVEL 01</b></h4>
                </div>
            </div>
        </a>
        <br>
        <a href="level2.php">
            <div class="card">

                <div class="container bg-dark">
                    <h4><b class="text-light">LEVEL 02</b></h4>

                </div>
            </div>
        </a>

        <br>
        <a href="level3.php">
            <div class="card">

                <div class="container bg-dark">
                    <h4><b class="text-light">LEVEL 03</b></h4>

                </div>
            </div>
        </a>
        <br>
        <a href="level4.php">
            <div class="card">

                <div class="container bg-dark">
                    <h4><b class="text-light">LEVEL 04</b></h4>

                </div>
            </div>
        </a>
        <br>
        <a href="level5.php">
            <div class="card">

                <div class="container bg-dark">
                    <h4><b class="text-light">LEVEL 05</b></h4>

                </div>
            </div>
        </a>


        <h5>Total Point You Earned: 500</h5>
        <h5>Total Point You Withdraw: 200</h5>
        <h5>Point Balance: 300</h5>

        <br>
        <a href="index.php"> <button class="btn-primary">HOME</button> </a>

    </div>
</body>

</html>