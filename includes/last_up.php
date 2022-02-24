<?php
  include_once 'dbh.php';
  session_start();
  $this_usr = $_SESSION['userId'];
  $result = mysqli_query($conn, "SELECT ts FROM uploads WHERE usr_who = $this_usr ORDER BY ts DESC LIMIT 1");
  $data = array();
  while ($row = mysqli_fetch_object($result))
  {
      array_push($data, $row);
  }
  echo json_encode($data);
  exit();
?>
