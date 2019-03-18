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
    <div id="map" style="width:100%; height:800px; margin-top:20px"></div>
    <script src="js/map.js">
        initMap();
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsKxdujg4iLb1HsqBEyhUqTxokbiuYwGU&callback=initMap&libraries=places">
    //todo mettre l'api key dans un fichier de constantes
</script>
</div>
<?php
include "footer.php";
?>