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

  <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #mapSchools {
        height: 80%;
        width: 70%;
        float: right;
        margin: auto; 
        position: absolute;
        right: 0px;
        
        
      }
      /* Optional: Makes the sample page fill the window. */
      
      table {
        font-size: 12px;
      }

      #listing {
        position: relative;
        /*width: 30%;*/
        height: 400px;
        overflow: scroll;
        
        top: 0px;
        cursor: pointer;
        overflow-x: hidden;
       
        float:left;
      }
      #findhotels {
        position: absolute;
        text-align: right;
        width: 100px;
        font-size: 14px;
        padding: 4px;
        z-index: 5;
        background-color: #fff;
      }
      #locationField {
        position: absolute;
        width: 190px;
        height: 25px;
        left: 108px;
        top: 0px;
        z-index: 5;
        background-color: #fff;
      }
      #controls {
        position: absolute;
        left: 300px;
        width: 140px;
        top: 0px;
        z-index: 5;
        background-color: #fff;
      }

      
      .placeIcon {
        width: 20px;
        height: 34px;
        margin: 4px;
      }
      .hotelIcon {
        width: 24px;
        height: 24px;
      }
      #resultsTable {
        border-collapse: collapse;
        width: 240px;
      }
      #rating {
        font-size: 13px;
        font-family: Arial Unicode MS;
      }
      .iw_table_row {
        height: 18px;
      }
      .iw_attribute_name {
        font-weight: bold;
        text-align: right;
      }
      .iw_table_icon {
        text-align: right;
      }
    </style>
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



          <li><a href="map_sc.php"> School</a></li>  
          <li style="background-color: red;"><a href="../Logout.php"> Logout </a></li>

        </ul>
      </div>
    </div>  

    <div class="row" style="margin-top: 30px;">
      <div id="mapSchools" ></div>

      <div id="listing">
        <table id="resultsTable">
          <tbody id="results"></tbody>
        </table>
      </div>

      <div style="display: none">
        <div id="info-content">
          <table>
            <tr id="iw-url-row" class="iw_table_row">
              <td id="iw-icon" class="iw_table_icon"></td>
              <td id="iw-url"></td>
            </tr>
            <tr id="iw-address-row" class="iw_table_row">
              <td class="iw_attribute_name">Address:</td>
              <td id="iw-address"></td>
            </tr>
            <tr id="iw-phone-row" class="iw_table_row">
              <td class="iw_attribute_name">Telephone:</td>
              <td id="iw-phone"></td>
            </tr>
            <tr id="iw-rating-row" class="iw_table_row">
              <td class="iw_attribute_name">Rating:</td>
              <td id="iw-rating"></td>
            </tr>
            <tr id="iw-website-row" class="iw_table_row">
              <td class="iw_attribute_name">Website:</td>
              <td id="iw-website"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, places, infoWindow;
      var markers = [];
      var autocomplete;
      var countryRestrict = {'country': 'us'};
      var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
      var hostnameRegexp = new RegExp('^https?://.+?/');

      var countries = {

        'br': {
          center: {lat: -14.2, lng: -51.9},
          zoom: 15
        }
      };

      function initMap() {
        map = new google.maps.Map(document.getElementById('mapSchools'), {
          zoom: countries['br'].zoom,
          center: countries['br'].center,
          mapTypeControl: false,
          panControl: false,
          zoomControl: false,
          streetViewControl: false
        });
        
        infoWindow = new google.maps.InfoWindow({
          content: document.getElementById('info-content')
        });


        places = new google.maps.places.PlacesService(map); 

         // posit =  new google.maps.LatLng(pos);
         
         search();

       }


       function search() {

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            // map.panTo(pos);
            var search = {
              location:pos,
              radius:2000,
              types: ['school'], 
              
            };


        
         

      

        

          places.nearbySearch(search, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            clearResults();
            clearMarkers();
            // Create a marker for each hotel found, and
            // assign a letter of the alphabetic to each marker icon.
            for (var i = 0; i < results.length; i++) {
              var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
              var markerIcon = MARKER_PATH + markerLetter + '.png';
              // Use marker animation to drop the icons incrementally on the map.
              markers[i] = new google.maps.Marker({
                position: results[i].geometry.location,
                animation: google.maps.Animation.DROP,
                icon: markerIcon
              });
              // If the user clicks a hotel marker, show the details of that hotel
              // in an info window.
              markers[i].placeResult = results[i];
              google.maps.event.addListener(markers[i], 'click', showInfoWindow);
              setTimeout(dropMarker(i), i * 100);
              addResult(results[i], i);
            }
            
            
          }
      
        });

            map.setCenter(pos);
            var marker = new google.maps.Marker({
              position: pos,
              title: "Sua localização",
              map: map,
              icon: '../img/marcador1.PNG',
            });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });


        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


        

      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          if (markers[i]) {
            markers[i].setMap(null);
          }
        }
        markers = [];
      }

      // Set the country restriction based on user input.
      // Also center and zoom the map on the given country.
      function setAutocompleteCountry() {

        clearResults();
        clearMarkers();
      }

      function dropMarker(i) {
        return function() {
          markers[i].setMap(map);
        };
      }

      function addResult(result, i) {
        var results = document.getElementById('results');
        var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
        var markerIcon = MARKER_PATH + markerLetter + '.png';

        var tr = document.createElement('tr');
        tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
        tr.onclick = function() {
          google.maps.event.trigger(markers[i], 'click');
        };

        var iconTd = document.createElement('td');
        var nameTd = document.createElement('td');
        var icon = document.createElement('img');
        icon.src = markerIcon;
        icon.setAttribute('class', 'placeIcon');
        icon.setAttribute('className', 'placeIcon');
        var name = document.createTextNode(result.name);
        iconTd.appendChild(icon);
        nameTd.appendChild(name);
        tr.appendChild(iconTd);
        tr.appendChild(nameTd);
        results.appendChild(tr);
      }

      function clearResults() {
        var results = document.getElementById('results');
        while (results.childNodes[0]) {
          results.removeChild(results.childNodes[0]);
        }
      }

      // Get the place details for a hotel. Show the information in an info window,
      // anchored on the marker for the hotel that the user selected.
      function showInfoWindow() {
        var marker = this;
        places.getDetails({placeId: marker.placeResult.place_id},
          function(place, status) {
            if (status !== google.maps.places.PlacesServiceStatus.OK) {
              return;
            }
            infoWindow.open(map, marker);
            buildIWContent(place);
          });
      }

      // Load the place information into the HTML elements used by the info window.
      function buildIWContent(place) {
        document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
        'src="' + place.icon + '"/>';
        document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
        '">' + place.name + '</a></b>';
        document.getElementById('iw-address').textContent = place.vicinity;

        if (place.formatted_phone_number) {
          document.getElementById('iw-phone-row').style.display = '';
          document.getElementById('iw-phone').textContent =
          place.formatted_phone_number;
        } else {
          document.getElementById('iw-phone-row').style.display = 'none';
        }

        // Assign a five-star rating to the hotel, using a black star ('&#10029;')
        // to indicate the rating the hotel has earned, and a white star ('&#10025;')
        // for the rating points not achieved.
        if (place.rating) {
          var ratingHtml = '';
          for (var i = 0; i < 5; i++) {
            if (place.rating < (i + 0.5)) {
              ratingHtml += '&#10025;';
            } else {
              ratingHtml += '&#10029;';
            }
            document.getElementById('iw-rating-row').style.display = '';
            document.getElementById('iw-rating').innerHTML = ratingHtml;
          }
        } else {
          document.getElementById('iw-rating-row').style.display = 'none';
        }

        // The regexp isolates the first part of the URL (domain plus subdomain)
        // to give a short URL for displaying in the info window.
        if (place.website) {
          var fullUrl = place.website;
          var website = hostnameRegexp.exec(place.website);
          if (website === null) {
            website = 'http://' + place.website + '/';
            fullUrl = website;
          }
          document.getElementById('iw-website-row').style.display = '';
          document.getElementById('iw-website').textContent = website;
        } else {
          document.getElementById('iw-website-row').style.display = 'none';
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwgKtk8lwTal0Ng_UkPU6JmqhDKtbmf0&libraries=places&callback=initMap">
  </script>
</body>
</html>