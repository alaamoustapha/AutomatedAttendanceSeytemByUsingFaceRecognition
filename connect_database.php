<?php
$link = mysqli_connect("localhost", "root", "", "automatic_attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysql_error());
}

?>