<?php

  if(isset($_POST['signup-submit'])){
    require 'dbh.php';

    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $repassword = $_POST['repsw'];
    $email = $_POST['email'];
    $usr_id = $_POST['user_id'];

    if (empty($username) || empty($password) || empty($email)) {
      header("Location: ../basics.php?error=emptyfields&uname=".$username."&email=".$email);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../basics.php?error=invalidusername&email=".$email);
      exit();
    }
    else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/", $password)){
      header("Location: ../basics.php?error=invalidpassword&email=".$email."uname=".$username);
      exit();
    }
    elseif ($password !== $repassword) {
      header("Location: ../basics.php?error=invalidcheckpass&email=".$email."uname=".$username);
      exit();
    }
  else {
    $sql = "SELECT name FROM users WHERE name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../basics.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../basics.php?error=usertaken&email=".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (name, pwd, email, user_id) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../basics.php?error=sqlerror");
          exit();
        }
        else {

          $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

          $cipher_method = 'aes-128-ctr';
          $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
          $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
          $crypted_token = openssl_encrypt($usr_id, $cipher_method, $email, 0, $enc_iv) . "::" . bin2hex($enc_iv);
          unset($token, $cipher_method, $enc_key, $enc_iv);

          mysqli_stmt_bind_param($stmt, "ssss", $username, $hashed_pwd, $email, $crypted_token);
          mysqli_stmt_execute($stmt);
          header("Location: ../basics.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../basics.php");
  exit();
}

?>
