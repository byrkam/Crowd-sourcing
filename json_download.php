<?php
session_start();
$connect= mysqli_connect("localhost","root","","loginsystem");

if(isset($_POST['file_name'])){
	
	$query="SELECT * from locations";
	$file = "js_export.json";
	$result=mysqli_query($connect, $query);
	$data=array();
	while($row = mysqli_fetch_assoc($result))
	{
		$data[]= $row;
			
	}
 //json_encode($data);
 file_put_contents($file, json_encode($data));
 
 header('Content-type: application/json');
header('Content-Disposition: attachment; filename="'.basename($file).'"'); 
header('Content-Length: ' . filesize($file));
		readfile($file);
		unlink($file);
	
    exit();
}
?>
