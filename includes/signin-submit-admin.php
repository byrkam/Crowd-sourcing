<?php

if(isset($_POST['signin-submit-admin'])){
  require 'dbh.php';

  $username = $_POST['usrname'];
  $password = $_POST['pswd'];

  if (empty($username) || empty($password)) {
    header("Location: ../admin_login.php?error=emptyfields&uname=".$username);
    exit();
  }
  else{
    $sql = "SELECT * FROM admin WHERE name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../admin_login.php?error=sqlerror");
      exit();
    }
    else{

      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $results = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($results)){
        if($password != $row['pwd']){
          header("Location: ../admin_login.php?error=wrongpwd");
          exit();
        }
        else if ($password == $row['pwd']) {
          session_start();
          $_SESSION['userId'] = $row['uni_id'];
          $_SESSION['usrname'] = $row['name'];

          header("Location: ../admin.php?login=success");
          exit();
        }
        else {
          header("Location: ../admin_login.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../admin_login.php?error=nouser");

      }
    }

  }
}
else{
  header("Location: ../basics.php");
  exit();
}
