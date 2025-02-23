<?php
session_start();
include 'connect.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkAcc = $conn->prepare("SELECT firstname,lastname,email ,password  FROM admin
        WHERE email = ? AND password = ? ");
    $checkAcc->bind_param("ss", $email, $password);
    $checkAcc->execute();
    $result = $checkAcc->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['firstname'] = $data['firstname'];
        $_SESSION['lastname'] = $data['lastname'];
        $_SESSION['logged'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        alert("Account Not Found");
        
    }
}
function alert($msg)
{
    echo ("<script>alert('$msg')</script>");
}
