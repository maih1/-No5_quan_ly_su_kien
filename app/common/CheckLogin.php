<?php
  if(!(isset($_SESSION["check_user_pass"]) && $_SESSION["check_user_pass"] == true)) {
    header("Location: login.php");
    exit;
  }
?>