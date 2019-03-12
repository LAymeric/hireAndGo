<?php
	$navbarItem = 'profile';
	//include "navbar.php";
	require_once "head.php";
	include "class/User.php";

	$user = new User($_SESSION["id"]);
	$user->selectUser($_SESSION["id"]);
?>

<!doctype html>
<html lang="en">
		<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.jpg')">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Espace Client
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#account" data-toggle="tab">Mon Compte</a></li>
			                            <li><a href="#bookings" data-toggle="tab">Mes Réservations</a></li>
			                            <li><a href="#subscribs" data-toggle="tab">Mon Abonnement</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="account">
										<div class="row">
											<div class="col-sm-3">
												<div class="picture-container">
													<div class="picture">
														<img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
														<input type="file" id="wizard-picture">
													</div>
													<h6>Changer sa photo</h6>
												</div>
											</div>
											<div class="col-sm-4">
                								<div class="form-group">
													<label>Nom: <?php echo $user->__get("name"); ?></label>
												</div>

                								<div class="form-group">
													<label>Prénom: <?php echo $user->__get("firstname"); ?></label>
												</div>
											</div>
											<div class="col-sm-4">
                								<div class="form-group">
													<label>Email: <?php echo $user->__get("email"); ?></label>
												</div>

                								<div class="form-group">
													<label>Phone: <?php echo $user->__get("phone"); ?></label>
												</div>
											</div>

										</div>
										<div class="row"/>
											<div class="col-sm-3">
											</div>
											<div class="col-sm-4">
                								<div class="form-group">
													<label>Ville : <?php echo $user->__get("city"); ?></label>
												</div>

                								<div class="form-group">
													<label>Pays : <?php echo $user->__get("country"); ?></label>
												</div>
											</div>
											<div class="col-sm-4">
                								<div class="form-group">
													<label>Adresse : <?php echo $user->__get("address"); ?></label>
												</div>

                								<div class="form-group">
													<label>Code Postal : <?php echo $user->__get("postalCode"); ?></label>
												</div>
											</div>
											<div class="form-group paddingLeft">
                								<a href="#">Mise a jour de mes informations</a>
             								 </div>

										</div>
		                            </div>
		                            <div class="tab-pane" id="bookings">

		                            </div>
		                            <div class="tab-pane" id="subscribs">

		                            </div>
		                        </div>
							</form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
			</div><!-- end row -->
			<div class="push"></div>
	    </div> <!--  big container -->

	</div>
	<!--     Fonts and icons     -->

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


  <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>


	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</body>

<?php
	include "footer.php";
?>


