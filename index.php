<?php
session_start();
require "dbcon.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
    <?php include('message.php') ?>
    <h1 class="text-center fw-bold">CRUD APP in PHP</h1>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Student Details <a href="student-create.php" class="btn btn-primary float-end">Add Students</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query  = "SELECT * FROM students";
                                $query_run = mysqli_query($con, $query);

                                // echo mysqli_num_rows($query_run);
                                if (mysqli_num_rows($query_run)) {
                                    foreach($query_run as $student){

                                ?>
                                        <tr>
                                            <td><?php echo $student['id'] ?></td>
                                            <td><?php echo $student['name'] ?></td>
                                            <td><?php echo $student['email'] ?></td>
                                            <td><?php echo $student['phone'] ?></td>
                                            <td><?php echo $student['course'] ?></td>
                                            <td>
                                                <a href="student-view.php?id=<?= $student['id']?>"class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?id=<?= $student['id']?>"class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $student['id']?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                }
                                } 
                                else {
                                    echo "<h4>No Record Found</h4>";
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>