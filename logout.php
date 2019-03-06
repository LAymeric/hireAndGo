<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 06/03/2019
 * Time: 12:25
 */



  session_start();
  session_unset();
  session_destroy();
  header("Location: index.php");