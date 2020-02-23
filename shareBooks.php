<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Share | BookShelf</title>


    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,600|Roboto+Condensed:300,400,700|Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">
    <script src="resources/js/jquery-1.11.2.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    
        <script>
      var map;
      var service;
      var infowindow;

      function initMap(lat, lng) {
        //var sydney = new google.maps.LatLng(6.9061, 79.9696);
        var sydney = new google.maps.LatLng(lat, lng);
        infowindow = new google.maps.InfoWindow();

        map = new google.maps.Map(
            document.getElementById('map'), {center: sydney, zoom: 15});

        var request = {
          query: 'intellisr (pvt) ltd',
          fields: ['name', 'geometry'],
        };

        service = new google.maps.places.PlacesService(map);

        service.findPlaceFromQuery(request, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker(results[i]);
            }

            map.setCenter(results[0].geometry.location);
          }
        });
      }

      function createMarker(place) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }

      function nameChanged(){
        initMap(6.9061, 79.9696);
    }
      
    </script>

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
                    <li ><a href="userMain.php">Home </a></li>
                    <li class="active"><a href="shareBooks.php">Share Books</a></li>
                    <li><a href="chatRoom.php">Chat Room</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color:#FFFFFF"><span class="glyphicon glyphicon-user" ></span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href=""> Shopping Cart</a></li>
                            <li class="divider"></li>
                            <li><a href="">Log out</a></li>
                        </ul>
                    </li>                    
                </ul>
              </div>

          </div>
        </nav>

          </div>
        </div>

    </div>

<!------------------------------------------------------------------------------------------------------------>

<div id="search-row">  
    
        <div id="search-container" class="container">         
          <div class="row">

            <div id="search-by-name" class="col-md-4">
              <form>
                <div class="input-group">
                  <input id="nnn" type="text" class="form-control" placeholder="Search By Name" onchange="nameChanged()">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div id="search-by-isbn" class="col-md-4">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search By ISBN">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
   </div>

     <div id="maps-row">
      <div class="container">
        <div class="row">
          <div id="map" class="col-md-12"></div>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq1uR22iiKmJe8aefKswWa4Td_gok0Mmk&libraries=places&callback=initMap" async defer></script>
           </div>
        </div>
    </div>

        <div class="col-sm-6">
            <div class="signup-form">
                <form action="" method="post">
                    <div class="text-center">
                        <h3>Add My Books</h3>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_name" name="isbn" placeholder="ISBN" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_position" name="name" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_office" name="author" placeholder="Author" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_office" name="price" placeholder="Price" required="required">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Add</button>
                    </div>
                    
                </form>

            </div>
        </div>
        
        <div class="col-sm-6">
             <table id="example" class="table table-bordered" style="width:100%;margin-top:100px; ">
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr >
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                </tr>          
                <tr onclick="tableDataLoad(3)">
                    <td><input type="hidden" id="3_name" value="Ashton Cox">Ashton Cox</td>
                    <td><input type="hidden" id="3_position" value="Junior Technical Author">Junior Technical Author</td>
                    <td><input type="hidden" id="3_office" value="San Francisco">San Francisco</td>
                    <td>66</td>
                </tr>

                <tr onclick="tableDataLoad(1)">
                    <td><input type="hidden" id="1_name" value="Airi Satou">Airi Satou</td>
                    <td><input type="hidden" id="1_position" value="Accountant">Accountant</td>
                    <td><input type="hidden" id="1_office" value="Tokyo">Tokyo</td>
                    <td>33</td>
                </tr>
                </tbody>
       
            </table>
        </div>



  </body>
</html>