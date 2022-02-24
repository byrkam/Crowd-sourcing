<?php
session_start();

if(isset($_POST['csv'])){
$connect= mysqli_connect("localhost","root","","loginsystem");

header('Content-Type:text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');
$output=fopen("php://output", "w");
fputcsv($output,array('timestampms','latitudeE7','longitudeE7','altitude','velocity','accuracy','verticalAccuracy','heading'));
$query="SELECT * from locations";
$result=mysqli_query($connect, $query);


while($row= mysqli_fetch_assoc($result))
{
	fputcsv($output,$row);
}
fclose($output);

}