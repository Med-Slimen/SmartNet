<?php
include 'connect.php';
if (isset($_POST['id_report'])) {
   $id_report = $_POST['id_report'];
   $q = $conn->prepare("SELECT* FROM reports WHERE id_report=?");
   $q->bind_param("s", $id_report);
   $q->execute();
   $res = $q->get_result();
   $fetch_result = $res->fetch_assoc();
   $reportName = $fetch_result["report_fullname"];
   $imgPath = $fetch_result["report_img"];
   if (file_exists($imgPath)) {
      unlink($imgPath);
   }
   $query = $conn->prepare("DELETE FROM reports WHERE id_report=?");
   $query->bind_param("s", $id_report);
   $query->execute();
   if ($query->affected_rows > 0) {
      $activiy_type = "Report Deleted";
      $activiy_description = $reportName . " Report Got Deleted";
      $icon = "fa-solid fa-file-circle-exclamation";
      $query2 = $conn->prepare("INSERT INTO recent_activity VALUES('',?,?,?)");
      $query2->bind_param("sss", $activiy_type, $activiy_description, $icon);
      $query2->execute();
      if ($query2->affected_rows > 0) {
         header("Location: reportPanel.php");
      } else {
         echo ("<script>alert('server probleme')</script>");
      }
   } else {
      echo ("error");
   }
}
