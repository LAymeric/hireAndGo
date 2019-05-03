<?php
    $navbarItem = "booking";
    include "head.php";
    include "navbar.php";

?>
    <div class="wrapper" id="wrapper-booking">
      <h1><?php echo MAIN_TITLE_BOOKING;?></h1>
      <h2><?php echo MAIN_SUBTITLE_BOOKING;?></h2>
    </div>
    <div class="push"></div>

    <div class="container center_div register-form">
        <div class="form-group" style="text-align: center;">
            <progress id="bookingProgress" max="100" value="33"> 33% </progress>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="reservation_date"><?php echo DATE_DEPARTURE?></label>
                <input type="date" class="form-control" name="reservation_date" id="reservation_date" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="reservation_time"><?php echo DATE_HOURS?></label>
                <input type="time" class="form-control" name="reservation_time" id="reservation_time" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_address"><?php echo ADDRESS_DEPARTURE?></label>
                <input type="text" class="form-control" name="departure_address" id="startAddress" placeholder="16 Avenue Foche" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_postal_code"><?php echo POSTAL_CODE_DEPARTURE?></label>
                <input type="text" class="form-control" id="startPC"  name="departure_postal_code" placeholder="75000" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="departure_city"><?php echo TOWN_DEPARTURE?></label>
                <input type="text" class="form-control" name="departure_city" id="startCity"  placeholder="Paris" required="required">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_address"><?php echo ADDRESS_DESTINATION?></label>
                <input type="text" class="form-control" name="arrival_address" id="endAddress" placeholder="12 Rue Saint-Hélène" required="required">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_postal_code"><?php echo POSTAL_CODE_DESTINATION?></label>
                <input type="text" class="form-control" name="arrival_postal_code"  id="endPC" placeholder="69000">
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group">
                <label for="arrival_city"><?php echo TOWN_DESTINATION?></label>
                <input type="text" class="form-control" name="arrival_city" placeholder="Lyon" id="endCity" required="required">
            </div>
            </div>
        </div>
        <div id="finalEnd"></div>
        <div id="finalStart"></div>

        <div class="form-group" style="text-align:center;">
            <div class="popup">
                <span class="popuptext" id="successPopup"><i class="far fa-check-circle"></i><?php echo SUCCES_COMMAND;?></span>
            </div>
            <div class="popupError">
                <span class="popuptext" id="errorPopup"><i class="far fa-times-circle"></i><?php echo ERROR_COMMAND;?></span>
            </div>
        </div>

        <div class="form-group" style="text-align:center;">
            <button type="button"  onclick="searchAddress('<?php echo $_SESSION['front_email']  ?>', '<?php echo $_SESSION['front_isPremium']?>')" class="btn btn-info"><?php echo VALIDATE?></button>
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
