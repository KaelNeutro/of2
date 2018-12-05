var geocoder;
var map;
var marker;
var  infoWindow;

$(document).ready(function () {
    initialize();
	$('#cep').blur( function(){
		var endereco = $('#cep').val();
		alert(endereco);
		geocoder.geocode({ 'address': endereco }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
		
					$('#lat').val(latitude);
                   	$('#lng').val(longitude);
		
					var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
				}
			}
		});
		google.maps.event.addListener(marker, 'drag', function () {
		geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {  
					$('#lat').val(latitude);
                   	$('#lng').val(longitude);
		
				}
			}
		});
	});

		// $('#seg-div').addClass('left');
		// $('#seg-div').removeClass('col-md-offset-4');
		// $('#map-div').addClass('col-md-8');
		// $('#map-div').removeClass('sem-div');
	});
});	


function initialize() {
	
     
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	var options = {
		zoom: 5,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map = new google.maps.Map(document.getElementById("mapa"), options);
	
	geocoder = new google.maps.Geocoder();
	
	marker = new google.maps.Marker({
		map: map,
		draggable: true,
	});
	
	marker.setPosition(latlng);


   
}


