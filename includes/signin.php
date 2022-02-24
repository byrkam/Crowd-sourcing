<?php

if(isset($_POST['signin-submit'])){
  require 'dbh.php';

  $username = $_POST['usrname'];
  $password = $_POST['pswd'];

  if (empty($username) || empty($password)) {
    header("Location: ../basics.php?error=emptyfields&uname=".$username);
    exit();
  }
  else{
    $sql = "SELECT * FROM users WHERE name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../basics.php?error=sqlerror");
      exit();
    }
    else{

      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $results = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($results)){
        $pwdcheck = password_verify($password, $row['pwd']);
        if($pwdcheck == false){
          header("Location: ../userhomepage.php?error=wrongpwd");
          exit();
        }
        else if ($pwdcheck == true) {
          session_start();
          $_SESSION['userId'] = $row['uni_id'];
          $_SESSION['usrname'] = $row['name'];

          header("Location: ../loggedin.php?login=success");
          exit();
        }
        else {
          header("Location: ../userhomepage.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../userhomepage.php?error=nouser");

      }
    }

  }
}
else{
  header("Location: ../basics.php");
  exit();
}
