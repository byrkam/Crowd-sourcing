<?php
		include_once '../includes/dbh.php';
    session_start();
    $this_usr = $_SESSION['userId'];
		$sql= "SELECT LEFT(MAX(goes_to.where_goes), 10) AS to_date, LEFT(MIN(goes_to.where_goes), 10) AS from_date FROM goes_to WHERE goes_to.who_goes = $this_usr"; 
		$result=mysqli_query($conn,$sql);
		$data = array();
			while ($row = mysqli_fetch_object($result))
			{
				array_push($data, $row);
			}
		echo json_encode($data);
		exit();
?>
