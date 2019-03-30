<?php
    $navbarItem = "booking";
    include "head.php";
    include "navbar.php";

?>
    <div class="wrapper" id="wrapper-booking">
      <h1>Reservation</h1>
      <h2>En route !</h2>
    </div>
    <div class="push"></div>

    <div class="container center_div register-form">
        <div class="form-group" style="text-align: center;">
            <progress id="bookingProgress" max="100" value="33"> 33% </progress>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="reservation_date">Date de départ</label>
                <input type="date" class="form-control" name="reservation_date" id="reservation_date" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="reservation_time">Heure de départ</label>
                <input type="time" class="form-control" name="reservation_time" id="reservation_time" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_address">Adresse de départ</label>
                <input type="text" class="form-control" name="departure_address" id="startAddress" placeholder="16 Avenue Foche" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_postal_code">Code postal de départ</label>
                <input type="text" class="form-control" id="startPC"  name="departure_postal_code" placeholder="75000" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_city">Ville de départ</label>
                <input type="text" class="form-control" name="departure_city" id="startCity"  placeholder="Paris" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_address">Adresse d'arrivée</label>
                <input type="text" class="form-control" name="arrival_address" id="endAddress" placeholder="12 Rue Saint-Hélène" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_postal_code">Code postal d'arrivée (Non obligatoire)</label>
                <input type="text" class="form-control" name="arrival_postal_code"  id="endPC" placeholder="69000">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_city">Ville d'arrivée</label>
                <input type="text" class="form-control" name="arrival_city" placeholder="Lyon" id="endCity" required="required">
            </div>
            </div>
        </div>
        <div id="finalEnd"></div>
        <div id="finalStart"></div>
        <div class="form-group" style="text-align:center;">
            <button type="button"  onclick="searchAddress()" class="btn btn-info">Valider</button>
        </div>
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
