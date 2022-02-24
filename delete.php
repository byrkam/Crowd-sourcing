<?php
$servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBname = "loginsystem";

  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBname);
  if(!$conn){
    die("Connection failed: ".mysqli_connet_error());
  }

$s1 = "DELETE  FROM leaderboard";
$s2 = "DELETE  FROM uploads";
$s3 = "DELETE  FROM users";
$s4 = "DELETE  FROM goes_to";
$s5 = "DELETE  FROM locations";
$s6 = "DELETE  FROM activities";


$query = mysqli_query($conn, $s1) or die($s1);
$query = mysqli_query($conn, $s2) or die($s2);
$query = mysqli_query($conn, $s3) or die($s3);
$query = mysqli_query($conn, $s4) or die($s4);
$query = mysqli_query($conn, $s5) or die($s5);
$query = mysqli_query($conn, $s6) or die($s6);

header("Location: admin_delete_success.php");
$message="Η διαγραφή ολοκληρώθηκε με επιτυχία";
echo"<script type='text/javascript'>alert('$message');</script>";
exit();
?>
