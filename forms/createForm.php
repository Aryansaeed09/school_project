<?php require "../includes/header.php" ?>

<div id="app">
    <?php require "../includes/sidebar.php" ?>
    <div id="main">

        <?php require "../includes/navbar.php" ?>


        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Add Student Form</h3>
                <p class="text-subtitle text-muted">
                    A good dashboard to display your statistics
                </p>
            </div>
            <section class="section">
                <form method="POST" action="<?=SITE_ROOT?>/actions/create_action.php" enctype="multipart/form-data">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>

                    <!-- file Field -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Student Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
                    </div>

                    <!-- Age Field -->
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age" required>
                    </div>

                    <!-- City Field (Dropdown) -->
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="city" name="city" required>
                            <option value="" selected disabled>Select your city</option>
                            <option value="Lodhran">Lodhran</option>
                            <option value="Multan">Multan</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Bahawalpur">Bahawalpur</option>
                        </select>
                    </div>

                    <!-- Course Field (Dropdown) -->
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option value="" selected disabled>Select your course</option>
                            <option value="1">Graphic Designing</option>
                            <option value="3">Full Stack Development</option>
                            <option value="2">Digital Marketing</option>
                            <option value="4">Mobile App Development</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
</div>

<?php require "../includes/footer.php" ?>