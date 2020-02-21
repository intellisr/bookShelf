<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | BookStore</title>


    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,600|Roboto+Condensed:300,400,700|Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">


<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

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
          query: 'Slit Campus Malabe, Malabe',
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
  <body>
   
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
                  <li class="active"><a href="#">Home </a></li>
                  <li ><a href="#">Share Books</a></li>
                  <li><a href="#">Chat Room</a></li>
                  <li><a href="#">Cart</a></li>

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

            <div id="search-by-cover" class="col-md-4">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search By Book Cover">
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


  </body>
</html>