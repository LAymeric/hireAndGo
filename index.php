<?php
    include "head.php";
    include "navbar.php";

?>
    <div class="wrapper" id="wrapper-index">
      <h1><?php echo MAIN_TITLE;?></h1>
      <h2><?php echo MAIN_SUBTITLE; ?></h2>

      <!-- Trigger the modal with a button -->
      <p>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#registerModal"><?php echo COMMAND_BUTTON; ?></button>
      </p>
    </div>


<div class="container text-center">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 feature">
    <span class="icon-medium">
      <i class="fas fa-car"></i>
    </span>

      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit,
        <strong>Reiciendis</strong> fugit.
      </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 feature">
      <span class="icon-medium">
        <i class="fas fa-compass"></i>
      </span>
      <p>
        Lorem ipsum dolor sit, amet consectetur <strong>adipisicing</strong> elit. Ea, id.
      </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 feature">
      <span class="icon-medium">
        <i class="far fa-credit-card"></i>
      </span>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, <strong>quibusdam</strong> deserunt quidem.
      </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 feature">
      <span class="icon-medium">
       <i class="fas fa-street-view"></i>
      </span>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium labore amet a itaque <strong>quibusdam</strong> impedit esse.
      </p>
    </div>
  </div>
</div>

<div class="vertical-spacer"></div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 mx-auto">
      <h2 class="text-center mb-3"><?php NEWSLETTER ?></h2>
      <form>
        <div class="row">
          <div class="form-group col-12">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder='<?php echo EMAIL_PLACEHOLDER; ?>'>
            <small id="emailHelp" class="form-text text-muted"><?php echo GUARANTY; ?></small>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-secondary"><?php echo SUBMIT; ?></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="vertical-spacer"></div>

      <!-- Modal -->
      <div id="registerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div classe="test">
            <div class="modal-header">
                <h4 class="modal-title" ><?php echo REGISTER ?> </h4>
            </div>
            <div class="modal-body">
              <form name="registerForm" method="POST" action="script/saveUser.php" onsubmit="return validateForm()" >
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name"><?php echo NAME; ?></label>
                      <input type="text" class="form-control" placeholder="Dupont" name="name"  required="required">
                      <div id="errorName" class="error" style="display: none"> <?php echo INVALID_NAME ?></div>
                    </div>
                  </div>

               <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname"><?php echo FIRSTNAME; ?></label>
                    <input type="text" class="form-control" placeholder="Yannis" name="firstname" required="required">
                    <div id="errorFirstname" class="error" style="display: none"><?php echo INVALID_FIRSTNAME ?></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="birthday"><?php echo BIRTHDATE; ?></label>
                    <input type="date" class="form-control" name="birthday" required="required">
                    <div id="errorBirthday" class="error" style="display:none"><?php echo INVALID_BIRTHDATE ?></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="du@pont.fr" name="email" required="required">
                    <div id="errorEmailExist" class="error" style="display:none"><?php echo INVALID_EMAIL ?></div>
                    <div id="errorEmail" class="error" style="display:none"><?php echo INVALID_EMAIL2 ?></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="city"><?php echo TOWN; ?></label>
                    <input type="text" class="form-control" placeholder="Paris" name="city" required="required">
                    <div id="errorCity" class="error" style="display:none"><?php echo INVALID_TOWN ?></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="postalCode"><?php echo POSTAL_CODE; ?></label>
                    <input type="text" class="form-control" placeholder="75000" name="postalCode" required="required">
                    <div id="errorPostalCode" class="error" style="display:none"><?php echo INVALID_POSTAL_CODE ?></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="address"><?php echo ADDRESS; ?></label>
                    <input type="text" class="form-control" placeholder="36 Rue Dupont" name="address" required="required">
                    <div id="errorAddress" class="error" style="display:none"><?php echo INVALID_ADDRESS ?></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="country"><?php echo COUNTRY; ?></label>
                    <select name="country">
                      <option value="France" selected="selected">France </option>

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
                    <div id="errorCountry" class="error" style="display:none"><?php echo INVALID_COUNTRY ?></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="phone"><?php echo PHONE; ?></label>
                    <input type="text" class="form-control" placeholder="06 XX XX XX XX" name="phone" required="required">
                    <div id="errorPhone" class="error" style="display:none"><?php echo INVALID_PHONE ?></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pwd"><?php echo PASSWORD; ?></label>
                    <input type="password" class="form-control" name="pwd" required="required">
                    <div id="errorPwd" class="error" style="display:none"><?php echo INVALID_PASSWORD ?></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pwdConfirm"><?php echo CONFIRMATION; ?></label>
                    <input type="password" class="form-control" name="pwdConfirm" required="required">
                    <div id="errorPwdConfirm" class="error" style="display:none"><?php echo INVALID_CONFIRMATION; ?></div>
                  </div>
                </div>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="cgu" required="required">
                <label class="form-check-label" style="margin-bottom:10px;"><?php echo CGU_ACCEPT ?> <a href="#"><?php echo CGU ?></a></label>
              </div>

              <div class="form-group">
                <a href="login.php"><?php echo ALREADY_REGISTER ?> </a>
              </div>

              <div class="form-group" style="text-align:center;">
                <button type="submit" class="btn btn-secondary"><?php echo VALIDATE ?> </button>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo CANCEL ?> </button>
            </div>
          </div>

        </div>
      </div>

    </div>

<?php
    include "footer.php";
?>
