<?php
 $dbhost = "86.104.45.98";
 $dbuser = "plustori_leila";
 $dbpass = "09014615171m";
 $db = "plustori_leila_pd";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 if ($conn->connect_error) {
    echo $conn->connect_error;
} 

?>
