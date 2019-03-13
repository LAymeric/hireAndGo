<?php

  if(isset($_COOKIE['lang'])) {
 		 $lang = $_COOKIE['lang'];
 	 } else {
 		 $lang = "fr";
    }

 	 if ($lang=='fr') {
 		 include('assets/i18n/fr.php');
 	 } elseif ($lang=='en') {
 		 include('assets/i18n/en.php');
 	 }else{
      include('assets/i18n/fr.php');
    }
 ?>
