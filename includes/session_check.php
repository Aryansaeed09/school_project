<?php
session_start();


// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
// echo "</pre>";
// exit;
$loginFormPath = "";
if ($_SERVER['REQUEST_URI'] == '/ags/index.php') {
    $loginFormPath = "./forms/loginForm.php";
} else {
    $loginFormPath = "../forms/loginForm.php";
}

// confirm user is logged in
if (isset($_SESSION['isLogin']) == false) {
    header("Location: $loginFormPath");
    exit;
}

