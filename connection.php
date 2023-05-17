<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "iterativeDB";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

  // echo "Conection Successfully";
?>