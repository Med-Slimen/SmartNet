<?php
// // Extend session lifetime
// ini_set('session.gc_maxlifetime', 86400);
// ini_set('session.cookie_lifetime', 86400);

// Start the session
session_start();
$host="localhost";
$user="root";
$pass="";
$db="smartnet";
$conn=new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    echo("failed to connect db".$conn->connect_error);
}
?>