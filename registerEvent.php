<?php
include 'connect.php';
require 'vendor/autoload.php';
session_start();
ob_start();
include 'email_template.php';
$emailBody = ob_get_clean();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["register_fname"])) {
    $fname = $_POST["register_fname"];
    $email = $_POST["register_email"];
    $gender = $_POST["gender"];
    $lname = $_POST["register_lname"];
    $eventId = $_POST["register_eventId"];
    $date = date("Y-m-d h:i:sa");
    $query = $conn->prepare("SELECT email FROM event_register WHERE email=? AND id_events=?");
    $query->bind_param("si", $email, $eventId);
    $query->execute();
    $res = $query->get_result();
    if ($res->num_rows > 0) {
        $_SESSION['status'] = "duplicate";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit();
    } else {
        $query2 = $conn->prepare("INSERT INTO event_register VALUES('',?,?,?,?,?,?)");
        $query2->bind_param("sssssi", $fname, $lname, $gender, $date, $email, $eventId);
        $query2->execute();
        if ($query2->affected_rows > 0) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'mohamedamineslimene01@gmail.com';                     //SMTP username
                $mail->Password   = 'pbdobbakaqfbseng';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('mohamedamineslimene01@gmail.com', 'Med');
                $mail->addAddress($email, 'Med');     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Event registration';
                $mail->Body    = $emailBody;
                if ($mail->send()) {
                    $_SESSION['status'] = "inserted";
                    header("Location: {$_SERVER["HTTP_REFERER"]}");
                    exit();
                }
            } catch (Exception $e) {
                $_SESSION['status'] = "error";
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            }
        } else {
            echo ("error");
        }
    }
}
