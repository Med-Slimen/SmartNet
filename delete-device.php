<?php
include 'connect.php';
$idDevice = $_POST["id_device"];
$query = $conn->prepare("DELETE FROM trusted_devices WHERE id = ?");
$query->bind_param("i", $idDevice);
$query->execute();
if ($query->affected_rows > 0) {
   $_SESSION["device_del"] = "deleted";
   header("Location: {$_SERVER["HTTP_REFERER"]}");
   exit();
} else {
   $_SESSION["device_del"] = "error";
   header("Location: {$_SERVER["HTTP_REFERER"]}");
   exit();
}
