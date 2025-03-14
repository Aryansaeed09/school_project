<?php require "./includes/header.php" ?>

<?php

// require "./includes/session_check.php";

// connection database
require "./includes/db_connection.php";

if (!$conn) {
    die("Database not connected");
}


// prepare query
$query = "SELECT students.*, courses.name AS course_name FROM students LEFT JOIN courses ON students.course_id=courses.id ORDER BY students.id ASC;";


$result = mysqli_query($conn, $query);



?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">

<div id="app">
    <?php require "./includes/sidebar.php" ?>
    <div id="main">

        <?php require "./includes/navbar.php" ?>


        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">
                    A good dashboard to display your statistics
                </p>
            </div>
            <section class="section">
            <table class="table display" id="datatable" style="width:100%">
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
            </section>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $("#datatable").DataTable();
    })
</script>
<?php require "./includes/footer.php" ?>