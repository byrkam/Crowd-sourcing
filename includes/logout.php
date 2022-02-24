<?php
require 'dbh.php';
if(isset($_POST['logoutbtn'])){
  session_start();
  unset($_SESSION['userId']);
  unset($_SESSION['usrname']);
  session_unset();
  session_destroy();
  header("Location: ../basics.php?logout=success");
  exit();
}
?>
