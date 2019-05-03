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
var startAddress = document.getElementById("startAddress");
var startPC = document.getElementById("startPC");
var startCity = document.getElementById("startCity");
var endAddress = document.getElementById("endAddress");
var endPC = document.getElementById("endPC");
var endCity = document.getElementById("endCity");
var reservation_time = document.getElementById("reservation_time");
var reservation_date = document.getElementById("reservation_date");
function searchAddress(email,isPremium) {
    var finalStart = document.getElementById("finalStart");
    var finalEnd = document.getElementById("finalEnd");
    var requestStart = {
        query: startAddress.value + " " + startPC.value + " " + startCity.value + " " ,
        fields: ['name']
    };
    var requestEnd = {
        query: endAddress.value + " " + endPC.value + " " + endCity.value,
        fields: ['name', 'geometry']
    };
    var service = new google.maps.places.PlacesService(map);
    service.findPlaceFromQuery(requestStart, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            finalStart.value = results[0].name
        }else {
            errorPopup()
        }
    });
    service.findPlaceFromQuery(requestEnd, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            finalEnd.value = results[0].name
        }else {
            errorPopup()
        }
    });
    //lancement de l'itinéraire
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map);

    calculateAndDisplayRoute(directionsService, directionsDisplay, email, isPremium);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, email, isPremium) {
    directionsService.route({
        origin: startAddress.value + " " + startPC.value + " " + startCity.value + " " ,
        destination: endAddress.value + " " + endPC.value + " " + endCity.value,
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var totalDistance = 0;
            var totalDuration = 0;
            var legs = response.routes[0].legs;
            for(var i=0; i<legs.length; ++i) {
                totalDistance += legs[i].distance.value;
                totalDuration += legs[i].duration.value;
            }
            $.ajax({ url: 'http://localhost:8080/api/command/new',
                data: JSON.stringify({
                    email:email,
                    start: startAddress.value + " " + startPC.value + " " + startCity.value,
                    end : endAddress.value + " " + endPC.value + " " + endCity.value,
                    distance:totalDistance/1000,
                    duration:totalDuration/60,
                    startTime: reservation_date.value + " " + reservation_time.value
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'POST',
                dataType: "json",
                success : function(code, status){
                    if(isPremium === "1"){
                        document.location.href="cart/service.php?idCommand="+code.id
                    }else {
                        document.location.href="cart/paiement.php?idCommand="+code.id
                    }
                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });


        } else {
            errorPopup()
        }
    });
}

var isShowing = false;
function successPopup() {
    if(!isShowing){
        isShowing = true;
        var popup = document.getElementById("successPopup");
        popup.className="popuptext show";
        setTimeout(function() {
            popup.className="popuptext invisible";
            isShowing = false;
        },5000);
    }
}
function errorPopup() {
    if(!isShowing) {
        isShowing = true;
        var popup = document.getElementById("errorPopup");
        popup.className="popuptext show";
        setTimeout(function () {
            popup.className="popuptext invisible";
            isShowing = false;
        }, 5000);
    }
}