<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Shop</title>
  
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,600|Roboto+Condensed:300,400,700|Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
      
    <!-- css -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">
    
    <script src="resources/js/jquery-1.11.2.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>

  </head>
  <body background="resources/images/shopBackground.jpg">
  
    <!--Start of Header Row-->
    <div id="header-row">
      
      <!--Start of Header-->
        <div id="header" class="container">         
          <div class="row">
            
          <!--Start of Header Left-->
            <div id="header-left" class="col-md-4 col-sm-4 hidden-xs">
              <a href="#" title="Home | BookStore"><img class="img-responsive" src="resources/images/logo_dark.png" alt="BookStore Logo"></a>
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
                <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#" title="Home | BookStore"><img src="resources/images/dimensions-it-logo-mini.png" alt="Dimensions IT Logo"></a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Login </a></li>
                </ul>
              </div>

          </div>
        </nav>
          <!--End of Header Right/Navigation-->

          </div>
        </div>
      <!--End of Header-->

    </div>
    <!--End of Header Row-->
<!------------------------------------------------------------------------------------------------------------>
    <div class ="container">
        <div class="signup-form col-sm-6">
            <form action="Controllers/shopRegister.php" method="post">
                <div class="text-center">
                    <h2>Register</h2>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Shop Name" required="required">
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="ad" name="address" placeholder="Address" required="required">
                    <a onclick="getlonlat()">GET latitude & longitude</a>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="lat" name="latitude" placeholder="latitude" required="required">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="lng" name="longitude" placeholder="longitude" required="required">
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                </div>
            </form>
        </div>

    </div>

<!------------------------------------------------------------------------------------------------------------>

<script type="text/javascript">
    
    function getlonlat(){
        var address=$("#ad").val();
        var extraData = "address=" + address;
        //console.log(extraData);
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/getLngLat.php',
        dataType: 'json',
        data: extraData,        
        success: function(data){
            if(data.code == 200){
               $("#lat").val(data.lati);
               $("#lng").val(data.long);
             }else{
               $("#lat").val("please enter valid address");
               $("#lng").val("please enter valid address");  
             }     
         }
        });
    }

</script>



</body>
</html>

