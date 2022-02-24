<?php
session_start();
$mysqli= mysqli_connect("localhost","root","","loginsystem");
/* check connection */
if ($mysqli->connect_errno) {
   echo "Connect failed ".$mysqli->connect_error;
   exit();
}


function createXMLfile($data){
  
   $filePath = 'xml_export.xml';
   $dom     = new DOMDocument('1.0', 'utf-8'); 
   $root      = $dom->createElement('locations'); 
   
   for($i=0; $i<count($data); $i++){
     
     $timestampms         =  $data[$i]['timestampms'];  
     $latitudeE7	      =  $data[$i]['latitudeE7'];
     $longitudeE7         =  $data[$i]['longitudeE7']; 
     $altitude     		  =  $data[$i]['altitude']; 
     $velocity      	  =  $data[$i]['velocity']; 
     $accuracy  		  =  $data[$i]['accuracy'];  
	 $verticalAccuracy	  =  $data[$i]['verticalAccuracy'];  
     $heading	          =  $data[$i]['heading'];
	 
     $location = $dom->createElement('timestampms');
     $location->setAttribute('timestampms', $timestampms);
	 
     $lat     = $dom->createElement('latitudeE7', $latitudeE7); 
     $location->appendChild($lat); 
	 
     $lon   = $dom->createElement('longitudeE7', $longitudeE7); 
     $location->appendChild($lon); 
	 
     $alt    = $dom->createElement('altitude', $altitude); 
     $location->appendChild($alt); 
	 
     $vel     = $dom->createElement('velocity', $velocity); 
     $location->appendChild($vel); 
     
     $acc = $dom->createElement('accuracy', $accuracy); 
     $location->appendChild($acc);
 
	 $vAcc = $dom->createElement('verticalAccuracy', $verticalAccuracy); 
     $location->appendChild($vAcc);
	 
	 $head = $dom->createElement('heading', $heading); 
     $location->appendChild($head);
 
 
     $root->appendChild($location);
   }
   $dom->appendChild($root); 
  
   header( 'Content-type: text/xml' );
   header('Content-Disposition: attachment; filename="' . $filePath . '";');
   echo $dom->saveXML();
   exit;
 } 



if(isset($_POST['xml'])){
$data=array();
$query = "SELECT timestampms,latitudeE7,longitudeE7,altitude,velocity,accuracy,verticalAccuracy,heading FROM locations ORDER BY timestampms";
if ($result = $mysqli->query($query)) {
	    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       array_push($data,$row);
    }
  
    if(count($data)){
         createXMLfile($data);
     }
    /* free result set */
    $result->free();
}
/* close connection */
$mysqli->close();
  }
?>



