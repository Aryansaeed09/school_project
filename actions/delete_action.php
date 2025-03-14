<?php
session_start();

// step 1 = Get id to delete

$id = $_GET['id'];


// step 2 = connect db
require "../includes/db_connection.php";

if (!$conn) {
    die("Database not connected");
}

    $sq = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $sq);
    $student = mysqli_fetch_assoc($result);

    if($student !== NULL) {
        // set image path with name
        $image_path = "../uploads/" . $student['image_name'];
        
        // confirm image is there
        if (file_exists($image_path) ) {
            unlink($image_path);
        } 

    } 

// step 3 = prepare query
$query = "DELETE FROM `students` WHERE id=$id";


// step 4 = Run query
if (mysqli_query($conn, $query)) {
    // step 5 = redirect to home page
    $_SESSION['deleted'] = "Student successfully deleted";
    
    header("Location: ../index.php");

} else {
    die("No student found.");
}
