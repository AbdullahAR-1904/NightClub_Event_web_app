<?php
$login = false;
$showerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'frequently_used/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "Select * from user where email='$email' AND password='$password' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    // if ($num == 1) {
    if (!$num == 0) {

        $showerror = "";


        $sql = "Select * from user where email='$email' AND password='$password' AND status=1 LIMIT 1";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if (!$num == 0) {

            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;

            header("location: index.php");

        } else {
            $showerror = "  Email Not approved yet";
        }


        // session will start below



    } else {
        $showerror = "  Invalid Credentials";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in </title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style type="text/css">
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 10vh;
        }
    </style>
</head>




<body>
    <?php require 'frequently_used/_nav.php' ?>


    <!-- alert -->



    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You have successfully logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>
        I
        ';
    }

    if ($showerror) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>' . $showerror . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>';

    }
    ?>

    <div class="center">
        <h1 class=" text-center py-5">Log in to our website</h1>
        <!-- form attached below -->

        <div class="col-md-4">
            <div class="container-fluid">
                <form action="/night_vibes/login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" maxlength="30" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required="required">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" maxlength="30" class="form-control" id="password" name="password"
                            required="required">
                    </div>

                    <button type="submit" class="btn btn-success mx-5" style="width: 150px;">Log in</button>
                    <div class="d-inline mx-2">
                        <a class="btn btn-primary" href="/night_vibes/index.php" style="width: 150px;">Guest User</a>

                    </div>

                </form>
                <div class="mt-3">
                    <a class="btn btn-danger" href="frequently_used/recover_email.php" style="width: 450px;">Forgot
                        Password</a>
                    <p class="text-center">Recover Your Password <a href="frequently_used/recover_email.php">Click
                            Here</a>
                    </p>
                </div>

            </div>
        </div>
    </div>




    <?php require 'frequently_used/_footer.php' ?>
    <!-- scripts down below -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

</body>
</html>