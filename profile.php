<?php
	$navbarItem = 'profile';
	include "navbar.php";
	require_once "head.php";
	include_once "class/User.php";

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
                								<a href="#" data-toggle="modal" data-target="#updateModal">Mise a jour de mes informations</a>
                                            </div>

                                            <div class="form-group paddingLeft">
                                                <a href="#" data-toggle="modal" data-target="#updatePwd">Changer mon mot de passe</a>
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

        <!-- Modal -->
        <div id="updateModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" >Modifier ses informations</h4>
                        </div>
                        <div class="modal-body">
                            <form name="updateUserForm" method="POST" action="script/updateUser.php" onsubmit="return validateForm()" >

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nom</label>
                                            <input type="text" class="form-control"  name="name" value="<?php echo $user->__get("name"); ?>">
                                            <div id="errorName" class="error" style="visibility:hidden">Nom invalide (entre 2 et 60 caractères)</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Prénom</label>
                                            <input type="text" class="form-control"  name="firstname" value="<?php echo $user->__get("firstname"); ?>">
                                            <div id="errorFirstname" class="error" style="display: none">Prénom invalide (entre 2 et 60 caractères)</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control"  name="email" value="<?php echo $user->__get("email"); ?>" required="required">
                                            <div id="errorEmailExist" class="error" style="display:none">Adresse email exeste déjà</div>
                                            <div id="errorEmail" class="error" style="display:none">Adresse email invalide</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Numéro de téléphone</label>
                                            <input type="text" class="form-control"  name="phone" value="<?php echo $user->__get("phone"); ?>" required="required">
                                            <div id="errorPhone" class="error" style="display:none">numéro invalide</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city">Ville</label>
                                            <input type="text" class="form-control"  name="city" value="<?php echo $user->__get("city"); ?>" required="required">
                                            <div id="errorCity" class="error" style="display:none">Mauvaise ville</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="postalCode">Code postal</label>
                                            <input type="text" class="form-control"  name="postalCode" value="<?php echo $user->__get("postalCode"); ?>" required="required">
                                            <div id="errorPostalCode" class="error" style="display:none">Code postale invalide</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Adresse</label>
                                            <input type="text" class="form-control" value="<?php echo $user->__get("address"); ?>" name="address" required="required">
                                            <div id="errorAddress" class="error" style="display:none">Adresse invalide (entre 5 et 60 caractères)</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">Pays</label>
                                            <select name="country">
                                                <option  selected="selected"><?php echo $user->__get("country"); ?></option>

                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option>
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>

                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin">Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina_Faso">Burkina_Faso </option>
                                                <option value="Burundi">Burundi </option>

                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap_vert">Cap_Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option>
                                                <option value="Chypre">Chypre </option>
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="Congo">Congo </option>
                                                <option value="Congo_democratique">Congo_democratique </option>
                                                <option value="Cook">Cook </option>
                                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                <option value="Costa_Rica">Costa_Rica </option>
                                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>

                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>

                                                <option value="Egypte">Egypte </option>
                                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats_Unis">Etats_Unis </option>
                                                <option value="Ethiopie">Ethiopie </option>

                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>

                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option>
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong_Kong">Hong_Kong </option>
                                                <option value="Hongrie">Hongrie </option>

                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>

                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>

                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>

                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option>
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>

                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>

                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>

                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option>
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto_Rico">Porto_Rico </option>
                                                <option value="Portugal">Portugal </option>

                                                <option value="Qatar">Qatar </option>

                                                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume_Uni">Royaume_Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>

                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                <option value="Saint_Marin">Saint_Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                                <option value="Senegal">Senegal </option>
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option>
                                                <option value="Sri_Lanka">Sri_Lanka </option>
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>

                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor_Oriental">Timor_Oriental </option>
                                                <option value="Togo">Togo </option>
                                                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option>
                                                <option value="Turquie">Turquie </option>

                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>

                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>

                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>

                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>
                                            </select>
                                            <div id="errorCountry" class="error" style="display:none">Mauvais Pays</div>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group" style="text-align:center;">
                                    <button type="submit" class="btn btn-info">Mettre à jour</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                </div>


                </div>
            </div>

        <!-- Modal -->
        <div id="updatePwd" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" >Modifier mon mot de passe</h4>
                    </div>
                    <div class="modal-body">
                        <form name="updateUserForm" method="POST" action="script/updatePwd.php" onsubmit="return validateForm()" >

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pwd">Mot de passe</label>
                                        <input type="password" class="form-control" name="pwd" required="required">
                                        <div id="errorPwd" class="error" style="display:none">Mot de passe invalide (mini 8 caractères)</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pwdConfirm">Confirmation</label>
                                        <input type="password" class="form-control" name="pwdConfirm" required="required">
                                        <div id="errorPwdConfirm" class="error" style="display:none">Confirmation invalide</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <button type="submit" class="btn btn-info">Valider</button>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    </div>
                </div>


            </div>
        </div>


<?php
	include "footer.php";
?>


