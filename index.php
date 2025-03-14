<?php require "./includes/header.php" ?>

<div id="app">
  <?php require "./includes/sidebar.php" ?>
  <div id="main">

    <?php require "./includes/navbar.php" ?>


    <?php
    require "./includes/db_connection.php";


    $totalStudentQ = "SELECT COUNT(*) AS total_students FROM `students`;";
    $result = mysqli_query($conn, $totalStudentQ);
    $totals = mysqli_fetch_assoc($result);

    $studentsByCourseQ = "SELECT courses.name AS course_name, COUNT(students.id) AS student_count FROM students LEFT JOIN courses ON students.course_id = courses.id GROUP BY courses.name;";
    $result2 = mysqli_query($conn, $studentsByCourseQ);

    // echo "<pre>";
    // print_r($students);
    // echo "</pre>";
    // exit;

    ?>


    <div class="main-content container-fluid">
      <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">
          A good dashboard to display your statistics
        </p>
      </div>
      <section class="section">
        <div class="row mb-2">
          <div class="col-12 col-md-4">
            <div class="card card-statistic">
              <div class="card-body p-0">
                <div class="d-flex flex-column">
                  <div class="px-3 py-3 d-flex justify-content-between">
                    <h3 class="card-title">Total Students</h3>
                    <div class="card-right d-flex align-items-center">
                      <p><?= $totals['total_students'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-12 col-md-4">
              <div class="card card-statistic">
                <div class="card-body p-0">
                  <div class="d-flex flex-column">
                    <div class="px-3 py-3 d-flex justify-content-between">
                      <h3 class="card-title"><?=$row['course_name']?></h3>
                      <div class="card-right d-flex align-items-center">
                        <p><?=$row['student_count']?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>
    </div>
  </div>
</div>

<?php require "./includes/footer.php" ?>