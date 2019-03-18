<?php
include "head.php";
include "navbar.php";
?>
<div style="margin-top:100px">
    <label for="start">Départ:</label>
    <input name="start" type="text" id="start"/>
    <label for="end">Arrivée:</label>
    <input name="end" type="text" id="end"/>
    <button type="button" onclick="searchAddress()">Rechercher</button>
    <div id="map" style="width:100%; height:500px; margin-top:20px"></div>
    <script>

        function searchAddress() {
            var start = document.getElementById("start");
            var end = document.getElementById("end");
            var requestStart = {
                query: start.value,
                fields: ['name']
            };
            var requestEnd = {
                query: end.value,
                fields: ['name', 'geometry']
            };
            var service = new google.maps.places.PlacesService(map);

            service.findPlaceFromQuery(requestStart, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    start.value = results[0].name
                    console.log(results[0].name)
                }else {
                    alert("no result for start")
                }
            });
            service.findPlaceFromQuery(requestEnd, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    end.value = results[0].name
                }else {
                    alert("no result for end")
                }
            });
        }
    </script>
    <script>
        var map;
        //todo mettre dans un fichier js séparé
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
    <script>
        /*function onAddressChange() {
            var input = document.getElementById("start").value
            if(input.length < 3){
                return
            }
            var url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input="+input+"&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key=AIzaSyAsKxdujg4iLb1HsqBEyhUqTxokbiuYwGU"
            var encoded = encodeURI(url);
            var service = new google.maps.places.PlacesService(map);

            service.findPlaceFromQuery(url, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    //for (var i = 0; i < results.length; i++) {
                        console.log(JSON.stringify(results))
                    //}
                    //map.setCenter(results[0].geometry.location);
                }
            });

        }*/
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsKxdujg4iLb1HsqBEyhUqTxokbiuYwGU&callback=initMap&libraries=places">
    //todo mettre lapi key dans un fichier de constantes
</script>
</div>
<?php
include "footer.php";
?>