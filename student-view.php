<?php

session_start();
require 'dbcon.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP CRUD/Student edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card  w-50 mt-5">
                    <div class="card-header">
                        <h4>Student Details <a href="index.php" class="btn btn-danger float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id  = mysqli_real_escape_string($con, $_GET['id']);
                            $query  = "SELECT * FROM students WHERE id ='$student_id'";
                            $query_run  = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                // print_r($student);

                        ?>

                            <div class="mb-3">
                                <label>Student Name</label>
                                <input type="text" name="name" value="<?php echo $student['name']; ?>" class="form-control" hidden>
                                <p class="form-control">
                                    <?php echo $student['name']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Student Email</label>
                                <input type="email" name="email" value="<?php echo $student['email']; ?>" class="form-control" hidden>
                                <p class="form-control">
                                    <?php echo $student['email']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Student Phone</label>
                                <input type="text" name="phone" value="<?php echo $student['phone']; ?>" class="form-control" hidden>
                                <p class="form-control">
                                    <?php echo $student['phone']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" value="<?php echo $student['course']; ?>" class="form-control" hidden>
                                <p class="form-control">
                                    <?php echo $student['course']; ?>
                                </p>
                            </div>
                        <?php

                            } else {
                                echo "<h4>No Such ID Found</h4>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>