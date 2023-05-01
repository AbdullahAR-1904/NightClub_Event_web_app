<?php
$Alert = false;
$showerror = false;
include 'frequently_used/_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $referal = $_POST["referal"];
    $checkreferal = "SELECT * FROM `referal` WHERE referal = '$referal'";
    $result = mysqli_query($conn, $checkreferal);

    $numofreferal = mysqli_num_rows($result);

    if ($numofreferal > 0) {
        include 'frequently_used/_dbconnect.php';
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $username = $_POST["username"];
        $recoveryemail = $_POST["recoveryemail"];

        $dateofbirth = $_POST["dateofbirth"];
        $born_in = $_POST["bornin"];


        // $exists = false;
        // to elimite any recuring email in database tutorial 43 : 7:50
        $checkemail = "SELECT * FROM `user` WHERE email = '$email'";
        $result = mysqli_query($conn, $checkemail);

        $numofemails = mysqli_num_rows($result);

        if ($numofemails > 0) {
            // $exists = true;
            $showerror = " Username Already Exists";
        } else {

            if (($password == $confirmpassword)) {


                $sql = "INSERT INTO `user` (`email`, `password`, `dateofbirth`, `born in`, `username`, `recoveryemail`, `status`) VALUES ( '$email', '$password', '$dateofbirth', '$born_in', '$username', '$recoveryemail', '0');";
                $result = mysqli_query($conn, $sql);
                echo "$result";

                if ($result) {
                    $Alert = true;
                    header("location: login.php");
                }

            } else {

                $showerror = " Passwords donot match";
            }
        }
    } else {
        $showerror = " invalid referal";
    }
}










?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up </title>


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
    if ($Alert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>
        I
        ';
    }
    // ABOVE code will execute is line 15-17 runs
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
        <h1 class="text-center py-5">Sign Up to our website</h1>
        <div class="col-md-4">
            <div class="container-fluid">
                <!-- form attached below -->

                <form action="/night_vibes/signup.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" maxlength="30" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp" required="required">

                    </div>
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
                    <div class="form-group">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" maxlength="30" class="form-control" id="confirmpassword"
                            name="confirmpassword" required="required">
                        <small id="emailHelp" class="form-text text-muted">Please enter the password again for
                            verification.</small>
                    </div>
                    <div class="form-group">
                        <label for="recoveryemail">Recovery Email</label>
                        <input type="email" maxlength="30" class="form-control" id="recoveryemail" name="recoveryemail"
                            required="required">
                        <small id="emailHelp" class="form-text text-muted">This will be used in case you forget your
                            credentials.</small>
                    </div>
                    <div class="form-group">
                        <label for="recoveryemail">Date of Birth</label>
                        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required="required">
                    </div>
                    <div class="form-group">
                        <label for="recoveryemail">Born in which city</label>
                        <input type="text" class="form-control" id="bornin" name="bornin" required="required">
                    </div>

                    <div class="form-group">
                        <label for="recoveryemail">Referal Code</label>
                        <input type="number" maxlength="30" class="form-control" id="referal" name="referal"
                            required="required">
                    </div>

                    <button type="submit" class="btn btn-primary">Sign up</button>
                </form>
            </div>
        </div>
    </div>

    <!-- scripts down below -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

</body>
</html>