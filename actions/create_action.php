<?php

// collect data 

// print_r($_POST);

// echo "<hr>";

// echo "<pre>";
// print_r($_FILES['image']);
// echo "</pre>";
// exit;

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


/** Upload Image from Form */
$image_name = null;
if (isset($_FILES['image'])) {
    
    // create some important variables
     $allowed_types = ['image/jpg', 'image/jpeg', 'image/png'];
     $allow_size = 2 * 1024 * 1024;

    // validate image extension
       if(in_array($_FILES['image']['type'], $allowed_types) == false) {
            die("file type is invalid");
       }

    // validate size
     if($_FILES['image']['size'] > $allow_size) {
        die("Image is too large");
     }  

     // extract extension of file
     $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // generate random name
     $unique_name = time() . "." . $ext;
     $destination = "../uploads/" . $unique_name;

    // move image from temp location to our folder
    if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
        $image_name = $unique_name;
    }

}

// run query
$q = "INSERT INTO `students` (`name`, `age`,`image_name`, `city`, `course_id`) VALUES ('$name', $age, '$image_name', '$city', $course_id)";

if (mysqli_query($conn, $q)) {
    header("Location: ../index.php");
} else {
    echo "error";
    echo mysqli_errno($conn);
}


// close connection
mysqli_close($conn);
