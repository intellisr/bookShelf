
<?php 
include 'db.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>puzzle</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="assets/js/crosswordpuzel.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/checkanswer.js"></script>

    <style type="text/css" media="screen">
        body {
            font: 62.5%/1.3em Helvetica, sans-serif;
            width: 90.3%;
            margin: 10px auto;
        }
        
        table {
            border-collapse: collapse;
            border-spacing: 0;
            max-width: 100%;
        }
        
        table tr {
            width: 100%;
        }
        
        table td {
            width: 5em;
            height: 5em;
            border: 1px solid #cdcdcd;
            padding: 0;
            margin: 0;
            background-color: rgb(90, 196, 134);
            position: relative;
        }
        
        td input {
            width: 100%;
            height: 100%;
            padding: 0em;
            border: none;
            text-align: center;
            font-size: 3em;
            color: #666;
            background-color: #f4f4f4;
        }
        
        td input:focus {
            background-color: #fff;
        }
        
        td span {
            color: #444;
            font-size: 0.8em;
            position: absolute;
            top: -1px;
            left: 1px;
        }
        
        input.done {
            font-weight: bold;
            color: green;
        }
        
        .active,
        .clues-active {
            background-color: #ddd;
        }
        
        .clue-done {
            color: #999;
            text-decoration: line-through;
        }
        
        #puzzle-wrapper {
            float: left;
            width: 54%;
            margin-right: 3%;
        }
        
        #puzzle-clues {
            float: left;
            width: 40%;
        }
        
        #puzzle-clues li {
            font-size: 1.2em;
            margin: .3em;
            line-height: 1.6em;
        }
    </style>

</head>

<body>
    <h1 id="level" align="center">LEVEL 01</h1>
    <div id="puzzle-wrapper">
        <!-- puzzle load here -->
    </div>
    <p id="answert">Answer</p>
    <a> <button onclick="answercheck()" id="answer" class="btn-Success">Submit Answer</button> </a>
    <a href="index.php"> <button class="btn-primary">HOME</button> </a>
    <a href="selectlevel.php"> <button class="btn-primary">END GAME</button> </a>
</body>

</html>

