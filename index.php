<?php


session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header("location: login.php");
//     exit;
// } ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        /* body {
            background-image: url('images/all.png');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        } */

        #cards {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
        }


        body {
            margin: 0;
            padding: 0;
        }

        .bg-img {
            background-image: url('images/event/zzzz.jpg');
            background-position: center;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -4;
        }

        .bg-img2 {
            background-image: url('images/event/zzz.jpg');
            background-position: center;
            background-size: cover;
            position: fixed;
            top: 100vh;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -3;
        }

        .bg-img3 {
            background-image: url('images/event/zz.jpg');
            background-position: center;
            background-size: cover;
            position: fixed;
            top: 200vh;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -2;
        }

        .bg-img4 {
            background-image: url('images/event/z.jpg');
            background-position: center;
            background-size: cover;
            position: fixed;
            top: 300vh;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
        }

        #categorybar {
            background-color: transparent;
            /* border: 2px solid black; */
        }

        #categorycard {
            background-color: transparent;
            border: transparent;
        }

        /* .table {
            background-color: white;
        }

         */
    </style>
</head>




<body>



    <script>
        window.addEventListener(" load", function () {
            var cards = document.querySelectorAll(".card"); for (var i = 0; i <
                cards.length; i++) { cards[i].style.opacity = "1"; }
        }); </script>
    <!-- below code is to add pictures in the background of my web application -->


    <div class="bg-img"></div>
    <div class="bg-img2"></div>






    <!-- <div class="bg-img3"></div> -->
    <!-- <div class="bg-img4"></div> -->

    <?php require 'frequently_used/_nav.php' ?>

    <section id="detail" class="my-5">
        <div class="py-5">
            <h2 class="text-center" style="color: white;">
                Upcoming Events
            </h2>
        </div>


        <!-- Buttons for categorizing -->
        <div class="container" id="categorybar">
            <nav class="navbar bg-body-tertiary">
                <h3 style="color:rgba(255, 255, 255, 0.8) ;" class="container justify-content-start">Categories</h3>

                <form action=" index.php" method="POST" class="container justify-content-start">

                    <button type="submit" class="btn btn-success me-2" name="date" type="button">Date</button>
                    <button type="submit" class="btn btn-success me-2" name="Location" type="button">Location</button>
                    <button type="submit" class="btn btn-success me-2" name="Category" type="button">Category</button>
                    <button type="submit" class="btn btn-success me-2" name="Enrolled" type="button">Tickets
                        Booked</button>
                </form>
            </nav>
        </div>
        <!-- 
        <div class="container" id="categorybar">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="categorycard">
                        <form action="index.php" method="POST" class="d-flex flex-wrap justify-content-between">
                            <button type="submit" name="date" class=" btn btn-primary btn-lg">Date</button>
                            <button type="submit" name="Location" class=" btn btn-primary btn-lg">Location</button>
                            <button type="submit" name="Category" class=" btn btn-primary btn-lg">Category</button>
                            <button type="submit" name="Enrolled" class=" btn btn-primary btn-lg">Tickets
                                Booked</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- ============== -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">



                    <?php

                    // =================================================================
                    include 'frequently_used/_dbconnect2.php';
                    global $sql;
                    global $result;
                    if (isset($_POST['date'])) {
                        $sql = "SELECT * FROM `event` WHERE eventdate >= CURDATE() ORDER BY `event`.`eventdate` ASC;";
                        $result = mysqli_query($conn, $sql);
                    } elseif (isset($_POST['Location'])) {
                        $sql = "SELECT * FROM `event` WHERE eventdate >= CURDATE() ORDER BY `event`.`location` ASC;";
                        $result = mysqli_query($conn, $sql);
                    } elseif (isset($_POST['Category'])) {
                        $sql = "SELECT * FROM `event` WHERE eventdate >= CURDATE() ORDER BY `event`.`category` ASC;";
                        $result = mysqli_query($conn, $sql);
                    } elseif (isset($_POST['Enrolled'])) {
                        $sql = "SELECT * FROM `event` WHERE eventdate >= CURDATE() ORDER BY `event`.`enrolled` ASC;";
                        $result = mysqli_query($conn, $sql);
                    } else {

                        // =======
                        include 'frequently_used/_dbconnect2.php';
                        $sql = "SELECT * FROM `event` WHERE eventdate >= CURDATE();";
                        $result = mysqli_query($conn, $sql);
                    }

                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $rows) {

                            $remain = $rows['mcapacity'] - $rows['enrolled'];
                            ?>

                            <div class="col-lg-4 col-md-4 col-sm-3">
                                <div class="card mb-2" id="cards">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <h2>
                                                <?= $rows['location'] ?>
                                            </h2>
                                            <p class="py-2"><b>Details:</b>
                                                <?= $rows['details'] ?>

                                                <br><b>Start time:</b>
                                                <?= $rows['stime'] ?>
                                                <br><b>End time:</b>
                                                <?= $rows['etime'] ?>
                                                <hr>
                                                <br><b>Date:</b>
                                                <?= $rows['eventdate'] ?>
                                                <br><b>Location:</b>
                                                <?= $rows['location'] ?>
                                                <br><b>Category:</b>
                                                <?= $rows['category'] ?>
                                                <br><b>Fees:</b>
                                                <?= $rows['fees'] ?>
                                                <br><b>Capacity:</b>
                                                <?= $rows['mcapacity'] ?>
                                                <br><b>Tickets Booked:</b>
                                                <?= $rows['enrolled'] ?>

                                                <br><b>Remaining Tickets :</b>
                                                <b>
                                                    <?= $remain ?>
                                                </b>
                                                <br><b>Artist:</b>
                                                <?php
                                                // now i do have the artist ID but i do not have the artist's name
                                                // to get the name and print it on the screen, i am using the below code
                                                include 'frequently_used/_dbconnect2.php';

                                                $artist_name = $rows['artist_id'];
                                                $sql = "SELECT artistname FROM artist WHERE artist_id= $artist_name;";
                                                $result = mysqli_query($conn, $sql);
                                                $data = array();
                                                $row = mysqli_fetch_assoc($result);
                                                $data[] = $row;
                                                $name = $data[0]["artistname"];

                                                echo $name; ?>
                                                <!-- === see for each loop above <td> for the back end code of how to call the name of artist -->
                                            </p>
                                        </h5>

                                        <p class="card-text">This is a card.</p>

                                    </div>
                                    <a href="frequently_used/bookticket.php?id=<?= $rows['id'] ?>"
                                        class="btn btn-success btn-sm">Book you ticket</a>
                                </div>
                            </div>

                            <?php
                        }

                    } else {
                        echo "No Record Found";
                    }



                    ?>
                </div>
            </div>
            <br>
        </div>
    </section>


    <!-- ================================== -->




    <!-- ================================== -->
    <?php
    include 'frequently_used/_dbconnect.php';
    echo $_SESSION['email'];


    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        $email . $_SESSION['email'];

        $sql = "SELECT `username` FROM `user` WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // save the password value into a variable
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            echo $username . "this is username";
        } else {
            // handle the case where the email is not found in the table
            echo "No password found for email: " . $email;
        }
    }

    ?>




    <!-- scripts down below -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

</body>
</html>