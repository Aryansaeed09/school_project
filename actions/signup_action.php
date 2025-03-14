<?php
session_start();
// print_r($_POST);
// echo "<br>";

// step 1 :  collect data
$name = $_POST['name'];
$email = $_POST['email'];
$user_pwd   = $_POST['password'];

// step 2 : db connection
require "../includes/db_connection.php";

if (!$conn) {
    die("Database not connected");
}

// step 3 : email varification email should be unique


        // step 3.1: select user on the basis of email
        $s_q = "SELECT * FROM users WHERE email='$email'";
        
        $result = mysqli_query($conn, $s_q);


        // step 3.2: check if email is already registered then show error
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error'] = "Email is already registered";
            header("Location: ../signupForm.php");
        }


// step 4: insert user data into db
      // hash the password
      $hashed = password_hash($user_pwd, PASSWORD_DEFAULT);

      $i_q = "INSERT INTO users (name, email, password) VALUES('$name', '$email', '$hashed')";
        

// step 5: redirect to login page
if(mysqli_query($conn, $i_q)) {
    header("Location: login.php");
} else {
    die("Something went wrong");
}
