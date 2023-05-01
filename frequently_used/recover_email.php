<?php
$Alert = false;
$showerror = false;
include '_dbconnect2.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $checkemail = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn, $checkemail);
    $numofemails = mysqli_num_rows($result);

    if ($numofemails) {
        $userdata = mysqli_fetch_array($result);
        $username = $userdata['username'];


        $subject = "Password Reset";
        $body = "Hey $username,. Click here to reset your password
        http://localhost/night_vibes/reset_password.php";
        $sender_email = "From: Night_Vibes@gmail.com";





        if (mail($email, $subject, $body, $sender_email)) {
            $_Session['msg'] = "check you mail to activate your account $email";



        } else {
            echo "no Email found. ";

        }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h3 class="text-center pt-5">Recover password</h3>
        <p>Please enter your Email address</p>
        <div class="col-md-4">

            <div class="container-fluid">
                <!-- form attached below -->

                <form action="/night_vibes/signup.php" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope">
                                </i>
                            </span>
                        </div>
                        <input type="email" maxlength="30" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" placeholder="Email Address" required>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Send mail</button>
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