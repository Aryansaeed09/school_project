<?php
session_start();

// step 1. collect data
$email = $_POST['email'];
$user_pwd   = $_POST['password'];
// echo $user_pwd;
// exit;

require "../includes/db_connection.php";


if (!$conn) {
    die("Database not connected");
}

// step 3. select user on with email
    $s = "SELECT * FROM users WHERE `email`='$email'";
    $result = mysqli_query($conn, $s);


// step 4. if not exist any user with provided email and password, redirct back to login with error
    if (mysqli_num_rows($result) <= 0) {
        $_SESSION['error'] = "Authentication failed, username or password is incorrect";
        header("Location: ../login.php");
        exit;
    } else {

        // verify password provided by user is correct ?
        $user = mysqli_fetch_assoc($result);

        if(password_verify($user_pwd, $user['password'])) {
            // step 5. if user exist redirect index.php
            $_SESSION['isLogin'] = true;
            header('Location: ../index.php');
            exit;
        } else {
            $_SESSION['error'] = "Authentication failed, username or password is incorrect";
            header("Location: ../login.php");
            exit;
        }
      
    }

