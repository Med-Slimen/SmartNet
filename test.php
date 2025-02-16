<?php
include 'connect.php';
$query = $conn->prepare("INSERT INTO `event-register`(`id`, `firstName`, `lastName`, `email`) VALUES ('','hhh','hhh','hhh')");
$query->execute();
