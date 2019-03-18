var map;
var directionsService;
var directionsDisplay;
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

    //lancement de l'itinéraire
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsDisplay);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
        origin: document.getElementById('start').value,
        destination: document.getElementById('end').value,
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
        } else {
            alert('Directions request failed due to ' + status);
        }
    });
}
