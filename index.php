<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="490351122846-0ksjact0kmjjgde6cmii0a99sk746jfe.apps.googleusercontent.com">
       <title>Home | BookStore</title>
   
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,600|Roboto+Condensed:300,400,700|Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Bootstrap -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">
     <script src="resources/js/jquery-1.11.2.min.js"></script>
     <script src="resources/js/bootstrap.min.js"></script>

  </head>
  <body background="resources/images/books.jpg">
   
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
                  <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#" title="Home | BookStore"><img src="resources/images/dimensions-it-logo-mini.png" ></a>
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

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <div class="account-wall">
                <div class="login-title">Sign In As</div>
            <ul class="nav nav-tabs">
                <li onclick="user()" class="active"><a href="#">Buyer</a></li>
                <li onclick="shop()"><a href="#">Shop Owner</a></li>
            </ul>
                
 <div class="userSignIn">                
   <div id="my-signin2"></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
      var userId=googleUser.getBasicProfile().getId();
      var name=googleUser.getBasicProfile().getName();
      var img=googleUser.getBasicProfile().getImageUrl();
      var email=googleUser.getBasicProfile().getEmail();
      var usrObj = {
        "Uid": userId,
        "Uname": name,
        "Uimg":img,
        "Uemail":email
     };
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/userLogin.php',
        dataType: 'json',
        data: usrObj});
    
    window.location = 'http://localhost/bookShelf/userMain.php';
    }
    
    function onFailure(error) {
      console.log(error);
    }
    
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
    
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  
</div>
            
             <div class="Shop">   
                <form class="form-signin" id="login" method="post">
                    <input type="text" class="form-control" placeholder="Shop" name="shop" required autofocus>
                    <input type="password" class="form-control" placeholder="Password" name="pw"  required>
                    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="shopLogin()">
                    Sign in</button>
                    <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                    <a href="#" class="text-center new-account">Create an account </a>
            </div>
        </div>         
            
        </div>
    </div>
</div>


  </body>
</html>

<script>
    
    $(function(){       
        $('.Shop').hide(); 
         
    });
    
    function shop(){
        $('.userSignIn').hide();
        $('.Shop').show(); 
    }
    
    function user(){
        $('.Shop').hide();
        $('.userSignIn').show(); 
    }
    
    function shopLogin(){
         //console.log("sdsdsd");
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/shopLogin.php',
        dataType: 'json',
        data: $('#login').serialize(),
        success: function () {
                       window.location.replace(' /bookShelf/shopMain.php');
            }
        });
    }
        
</script>