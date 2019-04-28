<?php

  if(isset($_COOKIE['lang'])) {
 		 $lang = $_COOKIE['lang'];
 	 } else {
 		 $lang = "fr";
    }

  $backToParent = ("/hireAndGo/admin" == $address) ? "../" : "";

	if ($lang=='fr') {
		include($backToParent.'assets/i18n/fr.php');
	} else if ($lang=='en') {
		include($backToParent.'assets/i18n/en.php');
	}else{
		include($backToParent.'assets/i18n/fr.php');
	}
 ?>
