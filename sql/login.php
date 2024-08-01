<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email ='$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        $user = mysqli_fetch_assoc($duplicate);
        if ($user['password'] == $password) {
            echo "<script>alert('Login Successful');</script>";
        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email');</script>";
    }
}
?>