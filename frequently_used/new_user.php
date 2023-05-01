<?php
$showerror = false;
include '_dbconnect.php';
if (isset($_POST['Accept'])) {

    $serial_id = mysqli_real_escape_string($conn, $_POST['Accept']);
    $sql = "UPDATE `user` SET `status`='1' WHERE `serial`='$serial_id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully";
        header("Location: ../index.php");


    } else {
        echo "Deleted";
        header("Location: new_user.php");
        $showerror = "Invalid Credentials";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($showerror) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>' . $showerror . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
        </button>
    </div>';

    }
    ?>
    <!-- ============ below code will provide the access to new user -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>New User Registrations
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>User name</th>
                                    <th>Date of Birth</th>

                                    <th>Born in</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '_dbconnect.php';
                                $query = "Select * FROM `user` WHERE `status` = 0";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                        ?>

                                        <tr>
                                            <td>
                                                <?= $row['email'] ?>
                                            </td>
                                            <td>
                                                <?= $row['username'] ?>
                                            </td>
                                            <td>
                                                <?= $row['dateofbirth'] ?>
                                            </td>

                                            <td>
                                                <?= $row['born in'] ?>
                                            </td>
                                            <td>
                                                <form action="new_user.php" method="POST" class="d-inline">
                                                    <button type="submit" name="Accept" value="<?= $row['serial'] ?>" class=" btn btn-success
                                                                    btn-sm">Accept</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "No New Registrations";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>