<?php

require "./includes/session_check.php";

// connection database
require "./includes/db_connection.php";

if(!$conn) {
    die("Database not connected");
} 


// prepare query
    $query = "SELECT students.*, courses.name AS course_name FROM students LEFT JOIN courses ON students.course_id=courses.id ORDER BY students.id ASC;";


// run query
  $result = mysqli_query($conn, $query);

//   $data = mysqli_fetch_all($result);

//   echo "<pre>";
//     print_r($data);
//   echo "</pre>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticer School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form mx-auto border shadow p-5 mt-5" style="background-color: #f1f1f1">

            <h1>AGS Schools</h1>

            <?php
                if( isset($_SESSION['deleted']) == true) {
                    echo "<div class='alert alert-success my-2'>{$_SESSION['deleted']}</div> ";
                    unset($_SESSION['deleted']);
                }
            ?>

            <div class="mb-3">
                <a class="btn btn-sm btn-success me-2" href="./forms/createForm.php">Insert Student</a>
                <a class="btn btn-sm btn-danger" href="./actions/logout.php">Logout</a>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th>Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">City</th>
                        <th scope="col">Course</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        if(mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                               echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td><img width='40px' src='uploads/{$row['image_name']}' ></td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['age']}</td>
                                        <td>{$row['city']}</td>
                                        <td>{$row['course_name']}</td>
                                        <td>
                                            <a href='./forms/updateForm.php?id={$row['id']}' class='btn btn-sm btn-warning me-2'>Edit</a>
                                            <a href='./actions/delete_action.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                                        </td>
                                    </tr>";
                            }

                        } else {
                            echo "No data found";
                        }
                    ?>

                </tbody>
            </table>
        </div>


    </div>
</body>

</html>

