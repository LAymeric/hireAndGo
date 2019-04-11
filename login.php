<?php
    $navbarItem = 'login';
    include "head.php";
    include "navbar.php";
?>
    <div class="wrapper" id="wrapper-login">
      <h1><?php echo MAIN_TITLE_LOGIN; ?></h1>
      <h2><?php echo MAIN_SUBTITLE_LOGIN; ?></h2>
    </div>

    <div class="push"></div>

    <div class="container center_div register-form" >
        <?php if (isset($_SESSION["failedLogin"])) {
            echo '<div class="push"></div>';
            echo '<div class="container-fluid">';
            echo '<div class="alert alert-danger">';
            echo $_SESSION["failedLogin"];
            echo '</div>';
            echo '</div>';
        }
        unset($_SESSION["failedLogin"]);
        ?>

        <form method="POST" action="script/userLogin.php">

        <div class="form-group login_fields">
            <label for="email"><?php echo EMAIL;?></label>
            <input type="email" class="form-control" placeholder="du@pont.fr" name="email" value="" required="required">
            <div id="errorEmailLogin" class="error" style="display: none"><?php echo LOGIN_FAIL_EMAIL ?></div>
        </div>

        <div class="form-group login_fields">
            <label for="pwd"><?php echo PASSWORD;?></label>
            <input type="password" class="form-control" name="pwd" required="required">
            <div id="errorPwdLogin" class="error" style="display: none"><?php echo LOGIN_FAIL_PWD ?></div>
        </div>


        <div class="push"></div>
        <div class="form-group" style="text-align:center;">
            <button type="submit" class="btn btn-info"><?php echo SIGN_IN;?></span></button>
        </div>

        <p class="font-weight-light">
            <a href="index.php" style="font-size: 14px; text-decoration: none; color: #000;"><?php echo SIGN_UP_ACCOUNT;?></a>
        </p>

        </form>

    </div>
    <div class="push"></div>



<?php

    include "footer.php";
?>
