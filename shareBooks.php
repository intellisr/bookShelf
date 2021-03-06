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
    
  </head>
  
  <body background="resources/images/shopBackground.jpg">   
    <!--Start of Header Row-->
    <div id="header-row">
    <?php $root=$_SERVER['DOCUMENT_ROOT'];
    include("$root/bookShelf/Controllers/common.php"); 
    session_start();
    
    $lat=$_SESSION["lat"];
    $lng=$_SESSION["lng"];
    
    
    ?>
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
                    <li ><a href="indexg.php">Puzzle</a></li>
                    <li><a href="chats/index.php">Chat Room</a></li>
                    <li class="dropdown">
                        <img src="<?php echo $_SESSION["userImg"];?>" class="img-circle dropdown-toggle"  data-toggle="dropdown" class="" alt="Cinque Terre" width="45" height="45"><b class="caret"></b>
                        <ul class="dropdown-menu">
                            <li><a href="https://myaccount.google.com/"> <?php echo $_SESSION["userName"];?></a></li>
                            <li><a href="cart.php"> Shopping Cart</a></li>
                            <li><a href="LocationChange.php"> Change My Location</a></li>
                            <li class="divider"></li>
                            <li><a href="Controllers/logout.php">Log out</a></li>
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
                  <input id="byName" type="text" class="form-control" placeholder="Search By Name">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="button" onclick="searchByName()">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div id="search-by-isbn" class="col-md-4">
              <form>
                <div class="input-group">
                  <input id="byISBN"type="text" class="form-control" placeholder="Search By ISBN">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="button" onclick="searchByISBN()">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
              
                <div class="row">
                <div id="search-by-isbn" class="col-md-12">
                    <label for="radiusSelect">Radius:</label>
                    <select id="radiusSelect" label="Radius">
                        <option value="100">100 kms</option>
                        <option value="50">50 kms</option>
                        <option value="30">30 kms</option>
                        <option value="20">20 kms</option>
                        <option value="10">10 kms</option>
                    </select>
                </div> 
                </div>  
              
          </div>
        </div>
   </div>
  

<div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>
    <div id="maps-row">
      <div class="container">
        <div class="row">
          <div id="map" class="col-md-12"></div>
      <script>
       
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;
      var marker1, marker2;
      var poly, geodesicPoly;

        function initMap(status,xlat,xlng) {
          
          var lat=<?php echo $lat; ?>;
          var lng=<?php echo $lng; ?>;
                      
          var myLoc = {lat: lat, lng: lng};
          var name='<?php echo $_SESSION["userName"];?>';
          var dis='<?php echo $_SESSION["userEmail"];?>';
                    
          
          if(status == null){              

          map = new google.maps.Map(document.getElementById('map'), {
            center: myLoc,
            zoom: 12,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();
          
          createMarker(myLoc,name,dis);

          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(markers[markerNum], 'click');
            }
          };
          
          }else{
              
              var place2={lat:xlat , lng: xlng};
                      
              map = new google.maps.Map(document.getElementById('map'), {
                center: myLoc,
                zoom: 13,
                mapTypeId: 'roadmap',
              });
             
             infoWindow = new google.maps.InfoWindow();              

                marker1 = new google.maps.Marker({
                  map: map,
                  position: myLoc
                });

                var html = "<b>" + name + "</b> <br/>" + dis;
                
                google.maps.event.addListener(marker1, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker1);
                });
                
                marker2 = new google.maps.Marker({
                  map: map,
                  position: place2
                });

                var bounds = new google.maps.LatLngBounds(
                    marker1.getPosition(), marker2.getPosition());
                map.fitBounds(bounds);

                google.maps.event.addListener(marker1, 'position_changed', update);
                google.maps.event.addListener(marker2, 'position_changed', update);
                
                map.setZoom(12);

                poly = new google.maps.Polyline({
                  strokeColor: '#FF0000',
                  strokeOpacity: 1.0,
                  strokeWeight: 3,
                  map: map
                });

                geodesicPoly = new google.maps.Polyline({
                  strokeColor: '#CC0099',
                  strokeOpacity: 1.0,
                  strokeWeight: 3,
                  geodesic: true,
                  map: map
                });

                update();
                
          }    
              
        }
        
        function update() {
            var path = [marker1.getPosition(), marker2.getPosition()];
            poly.setPath(path);
            geodesicPoly.setPath(path);
            var heading = google.maps.geometry.spherical.computeHeading(path[0], path[1]);
            document.getElementById('heading').value = heading;
            document.getElementById('origin').value = path[0].toString();
            document.getElementById('destination').value = path[1].toString();
        }

       function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }


       function createMarker(latlng, name, address) {
          var html = "<b>" + name + "</b> <br/>" + address;
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }



       function doNothing() {}
       </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4dxoeUInCf3G8HaAr8gPwbD-o9YX46I&libraries=places&callback=initMap" async defer></script>
        </div>
      </div>
    </div>

     <div id="middle-content" class="container">
        <?php 
            if($_SESSION["friend"] == "no"){
        ?>
        <div class="col-md-4 col-sm-4 col-xs-6 box-def grid">
          <figure class="effect-ruby">
              <img class="img-responsive" src="resources/images/slider/k.png" >  
          </figure>
        </div>
        
        <div class="col-md-4 col-sm-4 col-xs-6 box-def grid">
          <figure class="effect-ruby">
              <img class="img-responsive" src="resources/images/slider/r.png" >    
          </figure>
        </div>
          
        <div class="col-md-4 col-sm-4 col-xs-6 box-def grid">
          <figure class="effect-ruby">
              <img class="img-responsive" src="resources/images/slider/p.png" >    
          </figure>
        </div>  
          
        <?php   
            }else{
            $result=$_SESSION["friend"];
            $length = count($result);
            for($i=0;$i<$length;$i++){
        ?> 
          <script>
             initMap(1,<?php echo $result[0]['lat']; ?>,<?php echo $result[0]['lng']; ?>);
          </script>
          
        <div class="col-md-4 col-sm-4 col-xs-6 box-def grid"> 
          <figure class="effect-ruby" onclick="initMap(1,<?php echo $result[$i]['lat']; ?>,<?php echo $result[$i]['lng']; ?>);">
              <div>
              <img src="<?php echo $result[$i]['proPic'];?>" class="img-circle dropdown-toggle"  class="" alt="Cinque Terre" width="60" height="60">
              </div>
            <figcaption><span style="background-color:white;">
              <h4><span style="background-color:white;"><?php echo $i+1; ?>.Distance :<?php echo round($result[$i]['distance']*10,1); ?>KM</span></h4>
              <h3><span style="background-color:white;"><?php echo $result[$i]['Uname']; ?></span></h3>
              <h4><span style="background-color:white;">BOOK : <?php echo $result[$i]['bookName']; ?></span></h4>
              <h5><span style="background-color:white;">Author : <?php echo $result[$i]['author']; ?></span></h5>
              <h5><span style="background-color:white;">PRICE : <?php echo $result[$i]['price']; ?></span></h5>
              </span>
            </figcaption>     
          </figure>
            <a href="http://localhost/bookShelf/chats/index.php"><span style="background-color:white;">Chat with  <?php echo $result[$i]['Uname']; ?></span></a>
        </div>
          
        <?php   
            }}
        ?>     
       </div>

        <div class="col-sm-6">
            <div class="signup-form">
                <form action="Controllers/addBooks.php" method="post">
                    <div class="text-center">
                        <h3>Add My Books</h3>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_office" name="author" placeholder="Author" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_office" name="price" placeholder="Price" required="required">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Add</button>
                        <button type="button" class="btn btn-warning btn-lg btn-block" onclick="deleteData()">Delete</button>
                    </div>
                    
                </form>

            </div>
        </div>
        
        <div class="col-sm-6">
             <table id="example" class="table table-bordered" style="width:100%;margin-top:100px;background-color: #f5f5f5;">
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result= common::getbooksMy();
                while ($rows= mysqli_fetch_array($result)){?>
                    
                 <tr onclick="tableDataLoad('<?php echo $rows['isbn']; ?>','<?php echo $rows['name']; ?>')" >
                    <td ><?php echo $rows['isbn']; ?></td>
                    <td ><?php echo $rows['name']; ?></td>
                    <td ><?php echo $rows['author']; ?></td>
                    <td ><?php echo $rows['price']; ?></td>
                </tr>
                <?php } ?>          
               
                </tbody>
       
            </table>
            
        </div>

  </body>
</html>

<script>
    
    function tableDataLoad(id,name){
        $('#isbn').val(id);
        $('#name').val(name);
    }
    
    function deleteData(){
        var isbn=$("#isbn").val();
        var extraData = "isbn=" + isbn;
        //console.log(extraData);
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/deletebooks.php',
        dataType: 'json',
        data: extraData,        
        success: function(data){
            if(data.code == 200){
                location.reload();   
         }
        }});
    }    
    
    function searchByName(){
        
        var text=$("#byName").val();
        var type=1;
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/search.php',
        dataType: 'json',
        data: "text=" + text + "&type=" +type,        
        success: function(data){
             if(data.code == 200){
                  var list=data.msg;
                  SendData(list,type);
             }
         }
        });
        
    }
    
    function searchByISBN(){
        
        var text=$("#byISBN").val();
        var type=2;
        jQuery.ajax({
        type: "POST",
        url: '/bookShelf/Controllers/search.php',
        dataType: 'json',
        data: "text=" + text + "&type=" +type,        
        success: function(data){
             if(data.code == 200){
                  var list=data.msg;
                  SendData(list,type);
             }
         }
        });
        
    }
    
    
    function SendData(list,type){
        
        var lat=<?php echo $lat; ?>;
        var lng=<?php echo $lng; ?>;
        var rad=$("#radiusSelect").val();
        var where=list;
        var ty=type;
        var extraData = "lat=" + lat + "&lng=" +lng+ "&radius=" + rad + "&where=" + where + "&type=" + ty;
        jQuery.ajax({
        type: "GET",
        url: '/bookShelf/LocationSearchFriends.php',
        dataType: 'json',
        data: extraData,        
        success: function(data){
            if(data.code == 200){
                  location.reload();
             }     
         }
        });
    }
            
</script>