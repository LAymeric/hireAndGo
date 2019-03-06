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


        <form method="POST" action="script/saveReservation.php">
            <div class="form-group" style="text-align: center;">
                <progress id="bookingProgress" max="100" value="33"> 33% </progress>
            </div>

            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="reservation_date">Date de départ</label>
                    <input type="date" class="form-control" name="reservation_date"  required="required">
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="reservation_time">Heure de départ</label>
                    <input type="time" class="form-control" name="reservation_time" required="required">
                </div>
                </div>
            </div>    

            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="departure_address">Adresse de départ</label>
                    <input type="text" class="form-control" name="departure_address" placeholder="16 Avenue Foche" required="required">
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="departure_postal_code">Code postal de départ</label>
                    <input type="text" class="form-control" name="departure_postal_code" placeholder="75000" required="required">
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="departure_city">Ville de départ</label>
                    <input type="text" class="form-control" name="departure_city" placeholder="Paris" required="required">
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="arrival_address">Adresse d'arrivée</label>
                    <input type="text" class="form-control" name="arrival_address" placeholder="12 Rue Saint-Hélène" required="required">
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="arrival_postal_code">Code postal d'arrivée (Non obligatoire)</label>
                    <input type="text" class="form-control" name="arrival_postal_code" placeholder="69000">
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="arrival_city">Ville d'arrivée</label>
                    <input type="text" class="form-control" name="arrival_city" placeholder="Lyon" required="required">
                </div>
                </div>
            </div>

            <div class="form-group" style="text-align:center;">
            <button type="submit" class="btn btn-secondary">Valider</button>
            </div>
        </form>
    </div>
<?php
    include "footer.php";
?>