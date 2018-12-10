<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS--> 
    <link type="text/css" rel="stylesheet" href="..\css\style.css">
    <link href="..\css\style.css" rel="stylesheet" id="bootstrap-css">
    <!-- Bootstrap--> 
    
    <link href="..\bootstrap\css\bootstrapCDN.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Jquery--> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="..\js\jquery.min.js"></script>
    <script src="..\js\function.js"></script>
<!-- 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0">
</script> -->
<title>School Maps</title>
</head>
<body class="container">
    <div class="row">
        <div class="center-align">
            <ul class="nav ">
                <li><a href="homeU.php">Home</a></li> 


                <li><a href="#">Students</a>
                    <ul class ="sub">
                        <li><a href="reg_std.php"> Register </a></li> 
                        <li><a href="alter_std.php"> Alter Data</a></li>
                        <li><a href="view_std.php"> View or Remove </a></li>
                    </ul>
                </li>


                <li><a href="#">Vacancies</a>
                    <ul class ="sub">
                        <li><a href="search_vacancy.php"> <span class="glyphicon glyphicon-search"> </span>Search</a></li> 
                        <li><a href="sl_pd_std.php?sit=pending">Pending</a></li>
                        <li><a href="sl_pd_std.php?sit=accepted">Accepted</a></li>
                        <li><a href="sl_pd_std.php?sit=canceled">Canceled</a></li>
                        <li><a href="sl_pd_std.php?sit=declined">Declined</a></li>
                    </ul>
                </li> 


                <li><a href="#">User</a>
                    <ul class ="sub">
                        <li><a href="alter_u.php" > Edit Account </a></li> 
                        <li><a href="delfulluser.php"> Remove Account </a></li>

                    </ul> 
                </li>



                <li><a href="map_school.php"> School </a></li> 
                
            </ul>
        </div>
    </div>  
    <div class="row">
        <div id="mapSchools" ></div>

    </div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('mapSchools'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 15
      });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
          };
          infoWindow.setPosition(pos);
          infoWindow.setContent('Local Atual');
          infoWindow.open(map);
          map.setCenter(pos);
          var marker = new google.maps.Marker({
            position: pos,
            title: "Sua localização",
            map: map,
            icon: '../img/marcador1.PNG'
        });

          map.setCenter(pos);
          
          $.getJSON('https://maps.googleapis.com/maps/api/place/textsearch/json?query=school&sensor=true&location='+pos.lat+','+pos.lng+'&radius=2000&pagetoken&key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0', function(loc) {

            // $.each(loc, function(index, data) {

                for (var i = 0; i < loc.results.length; i++) {

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(loc.results[i].geometry.location.lat,loc.results[i].geometry.location.lng),
                        title: loc.results[i].name,
                        map: map
                    });
                }
            });
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
    });
      } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
      }
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0&callback=initMap">
</script>
</body>
</html>