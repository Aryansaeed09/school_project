<?php
require "../includes/session_check.php";

// exit;
// step 1 = get id from url
$id = $_GET['id'];


// step 2 = connect database
$host  = 'localhost';
$user  = "root";
$pwd   = "";
$db    = "agsdb";

$conn = mysqli_connect($host, $user, $pwd, $db);

if (!$conn) {
    die("Database not connected");
}

// step 3 = prepare query
$select_q = "SELECT * FROM students WHERE id=$id";

// step 4 = get data from database
$result = mysqli_query($conn, $select_q);
$data = null;


if (mysqli_num_rows($result) <= 0) {
    die("No data found");
} else {
    $data = mysqli_fetch_assoc($result);
}

// print_r($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 5 Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Student Registration Form</h2>
        <form method="POST" action="../actions/update_action.php">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" value="<?php echo $data['name'] ?>" name="name" class="form-control" id="name" placeholder="Enter your name" required autocomplete="off">
            </div>

            <!-- Age Field -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" value="<?= $data['age'] ?>" name="age" class="form-control" id="age" placeholder="Enter your age" required>
            </div>

            <!-- City Field (Dropdown) -->
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select class="form-select" id="city" name="city" required>
                    <option value="" selected disabled>Select your city</option>
                    <option value="Lodhran" <?php if ($data['city'] == 'Lodhran') {echo 'selected';}  ?>>Lodhran</option>
                    <option value="Multan" <?php if ($data['city'] == 'Multan') {echo 'selected';}  ?>>Multan</option>
                    <option value="Karachi" <?php if ($data['city'] == 'Karachi') {echo 'selected';}  ?>>Karachi</option>
                    <option value="Bahawalpur" <?php if ($data['city'] == 'Bahawalpur') {echo 'selected';}  ?>>Bahawalpur</option>
                </select>
            </div>

            <!-- Course Field (Dropdown) -->
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" id="course_id" name="course_id" required>
                    <option value="" selected disabled>Select your course</option>
                    <option value="1" <?php if ($data['course_id'] == '1') {
                                            echo 'selected';
                                        }  ?>>Graphic Designing</option>
                    <option value="3" <?php if ($data['course_id'] == '3') {
                                            echo 'selected';
                                        }  ?>>Full Stack Development</option>
                    <option value="2" <?php if ($data['course_id'] == '2') {
                                            echo 'selected';
                                        }  ?>>Digital Marketing</option>
                    <option value="4" <?php if ($data['course_id'] == '4') {
                                            echo 'selected';
                                        }  ?>>Mobile App Development</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>