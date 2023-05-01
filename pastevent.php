<?php

session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Events</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>

    <?php require 'frequently_used/_nav.php' ?>

    <section id="detail" class="my-5">
        <div class="py-5">
            <h2 class="text-center" style="color: white;">
                Upcoming Events
            </h2>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <?php
                    // below code written to extract all the data from the event table of the event_artist database
                    include 'frequently_used/_dbconnect2.php';
                    // $sql = "SELECT * FROM `event`";
                    
                    // Below code is working and displaying the events of today
                    // $sql = "SELECT * FROM `event` WHERE eventdate = CURDATE();";
                    
                    $sql = "SELECT * FROM `event` WHERE eventdate < CURDATE();";

                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0) {

                        foreach ($result as $rows) {



                            ?>

                            <div class="col-lg-4 col-md-4 col-sm-3">
                                <div class="card mb-2">
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
</body>
</html>