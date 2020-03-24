<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Books | Shop</title>


    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,600|Roboto+Condensed:300,400,700|Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
    
    
    <!-- css -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">

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
                    <li ><a href="shopMain.php">Home </a></li>
                    <li class="active"><a href="shopAddBooks.php">Add Books</a></li>
                    <li class="divider"></li>
                    <li><a href="Controllers/logout.php">Log out</a></li>
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
<div class ="container" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="col-sm-12">
        <div class="col-sm-6">
            <div class="signup-form">
                <form action="Controllers/addBooksShop.php" method="post">
                    <div class="text-center">
                        <h2>Insert Books</h2>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="isbn" placeholder="ISBN" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="name" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="author" placeholder="Author" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="price" placeholder="Price" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="quantity" placeholder="Quantity" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Add</button>
                    </div>
                    
                </form>

            </div>
        </div>
        <div class="col-sm-6">
        </div>
    </div>

</div>

<!------------------------------------------------------------------------------------------------------------>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
<script src="resources/js/bootstrap.min.js"></script>
<!--Table View js-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript" src="resources/js/jquery.cslider.js"></script>

<script type="text/javascript">
    $(function() {

        $('#da-slider').cslider({
            autoplay  : true,
            bgincrement : 450
        });

        $(document).ready(function() {
            $('#example').DataTable();
        } );


        $window = $(window);
        var $scroll = $('#bottom-full');
        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $scroll.data('speed'));
            var coords = '50% '+ yPos + 'px';
            $scroll.css({ backgroundPosition: coords });
        });

    });

    function tableDataLoad(id){
        $('#edit_name').val($('#'+id+'_name').val());
        $('#edit_position').val($('#'+id+'_position').val());
        $('#edit_office').val($('#'+id+'_office').val());
    }


</script>



</body>
</html>

