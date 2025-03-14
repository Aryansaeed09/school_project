<?php


// collect data 

// print_r($_POST);
// exit;

$id   = $_POST['id'];
$name = $_POST['name'];
$age  = $_POST['age'];
$city = $_POST['city'];
$course_id = $_POST['course_id'];


//todo add validation


// connect database
require "../includes/db_connection.php";

if (!$conn) {
    die("Database not connected");
}


// run query

$q = "UPDATE `students` SET `name`='$name', `age`=$age, `city`='$city', `course_id`=$course_id WHERE id=$id";

if (mysqli_query($conn, $q)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "error";
    echo mysqli_errno($conn);
    exit;
}


// close connection
mysqli_close($conn);
