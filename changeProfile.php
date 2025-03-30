<?php
include 'connect.php';
session_start();
$conn->autocommit(false);
$success = true;
if (isset($_POST["email"])) {
   if (isset($_FILES["pf"]) && $_FILES["pf"]["error"] == 0) {
      $targetDir = "images/";
      $fileName = time() . "_" . basename($_FILES["pf"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      if (move_uploaded_file($_FILES["pf"]["tmp_name"], $targetFilePath)) {
         $imagePath = $targetFilePath;
         $logo = $conn->prepare("UPDATE admins SET avatar=? WHERE admin_id=?");
         $logo->bind_param("si", $imagePath, $_SESSION["admin_id"]);
         $logo->execute();
         if ($logo->affected_rows < 0) {
            $success = false;
            error_log("failed for updating pf ");
         } else {
            $_SESSION["avatar"] = $imagePath;
         }
      } else {
         $success = false;
         error_log("failed for updating pf ");
      }
   }

   $firstName = $_POST["firstName"];
   $lastName = $_POST["lastName"];
   $email = $_POST["email"];
   $queries = [
      "firstName" => ["UPDATE admins SET firstName=? WHERE admin_id=?", $firstName, $_SESSION["admin_id"]],
      "lastName" => ["UPDATE admins SET lastName=? WHERE admin_id=?", $lastName, $_SESSION["admin_id"]],
      "email" => ["UPDATE admins SET email=? WHERE admin_id=?", $email, $_SESSION["admin_id"]],
   ];
   foreach ($queries as $name => $queryDetails) {
      $query = $conn->prepare($queryDetails[0]);
      if (!$query) {
         $success = false;
         error_log("failed for " . $name . " " . $conn->error);
         break;
      }
      $query->bind_param("si", $queryDetails[1], $queryDetails[2]);
      if (!$query->execute()) {
         $success = false;
         error_log("failed for " . $name . " " . $query->error);
         break;
      }
      $query->close();
   }
   if ($success) {
      $_SESSION['firstname'] = $firstName;
      $_SESSION['lastname'] = $lastName;
      $_SESSION["email"] = $email;
      $conn->commit();
      $_SESSION["updated_profile"] = "updated";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   } else {
      $conn->rollback();
      $_SESSION["updated_profile"] = "error";
      header("Location: {$_SERVER["HTTP_REFERER"]}");
      exit();
   }
   $conn->autocommit(true);
}
