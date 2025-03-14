<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form mx-auto border shadow p-5 mt-5" style="width: 650px; background-color: #f1f1f1">
            <h1>Login Form</h1>
            <?php
                if(isset($_SESSION['error']) == true) {
                    echo "<div class='alert alert-danger my-2'>{$_SESSION['error']}</div> ";
                    unset($_SESSION['error']);
                }
            ?>
            <form method="post" action="loginform_action.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" required placeholder="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-warning me-2">Login</button>
                    <a class="btn" href="signupForm.php">Signup</a>
                </div>
            </form>

        </div>


    </div>
</body>

</html>