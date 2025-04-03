<?php
include 'connect.php';
require 'vendor/autoload.php';
$timeout_duration = 1800; // 30 minutes (in seconds)

// Check if the last activity time is set
if (isset($_SESSION['LAST_ACTIVITY'])) {
    $time_since_last_activity = time() - $_SESSION['LAST_ACTIVITY'];

    // If the user has been inactive for too long, destroy the session
    if ($time_since_last_activity > $timeout_duration) {
        session_unset();  // Clear session data
        session_destroy(); // Destroy the session
        header("Location: adminPanel.php?timeout=true"); // Redirect to login
        exit();
    }
}

// Update last activity timestamp
$_SESSION['LAST_ACTIVITY'] = time();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkAcc = $conn->prepare("SELECT*  FROM admins
        WHERE email = ? AND passwords = ? ");
    $checkAcc->bind_param("ss", $email, $password);
    $checkAcc->execute();
    $result = $checkAcc->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $admin_id = $data['admin_id'];
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['avatar'] = $data['avatar'];
        $_SESSION['firstname'] = $data['firstName'];
        $_SESSION['lastname'] = $data['lastName'];
        $mail = new PHPMailer(true);
        $verifCode = rand(0, 1000000);
        $_SESSION["email"] = $data['email'];
        $_SESSION["code"] = $verifCode;
        $remeb = $_POST['remeb'] ?? "";
        ob_start();
        include 'email_verification.php';
        $emailBody = ob_get_clean();
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mohamedamineslimene01@gmail.com';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('mohamedamineslimene01@gmail.com', 'SmartNet');
            $mail->addAddress($email, 'SmartNet');     //Add a recipient
            //Content
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email verification';
            $mail->Body    = $emailBody;
            if ($remeb == "on") {
                do {
                    $token = bin2hex(random_bytes(32));
                    $token_check = $conn->prepare("SELECT admin_token FROM admins WHERE admin_token=? ");
                    $token_check->bind_param("s", $token);
                    $token_check->execute();
                    $res_token = $token_check->get_result();
                } while ($res_token->num_rows > 0);
                $expire = strtotime("+1 year");
                $_SESSION["remeber_token"] = $token;
                $_SESSION["remeber_token_expire"] = $expire;
            }
            if (isset($_COOKIE["trusted_token"])) {
                $trusted_token = $_COOKIE["trusted_token"];
                $checkTrust = $conn->prepare("SELECT* FROM trusted_devices WHERE trusted_token=? AND admin_id=?");
                $checkTrust->bind_param("si", $trusted_token, $admin_id);
                $checkTrust->execute();
                $checkTrustRes = $checkTrust->get_result();
                if ($checkTrustRes->num_rows > 0) {
                    $_SESSION["logged"] = true;
                    $set_token = $conn->prepare("UPDATE admins SET admin_token=?,admin_token_expire=? WHERE admin_id=?");
                    $set_token->bind_param("sii", $token, $expire, $admin_id);
                    $set_token->execute();
                    setcookie("token", $token, $expire);
                    header("Location: dashboard.php");
                    exit();
                } else {
                    setcookie("trusted_token", "", 0);
                }
            }
            if ($mail->send()) {
                header("Location: login_verification.php");
                exit();
            } else {
                setcookie("token", "", 0);
                echo ("oops");
            }
        } catch (Exception $e) {
            echo ("<script>alert('server probleme3')</script>");
        }
    } else {
        alert("Account Not Found");
    }
}
function alert($msg)
{
    echo ("<script>alert('$msg')</script>");
}
