<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<script>
    var map;
    // Initialize and add the map
    function initMap() {
        // The location of the user
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 6
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                new google.maps.Marker({position: pos, map: map});
                map.setCenter(pos);
                map.setZoom(18);
            });
        }
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsKxdujg4iLb1HsqBEyhUqTxokbiuYwGU&callback=initMap">
    //todo mettre lapi key dans un fichier de constantes
</script>
</body>
</html>