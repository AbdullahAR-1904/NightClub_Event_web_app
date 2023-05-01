<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// save the below code to the file event_include/event-create.php
include 'frequently_used/_dbconnect2.php';

// ============== below code if for update event_include/event-delete.php

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['delete']);
    $sql = "DELETE FROM `event` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Event deleted successfully";
        header("Location: event.php");
        exit(0);

    } else {
        $_SESSION['message'] = "Event not deleted";
        header("Location: event.php");
        exit(0);
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Events</title>

    <style>
        body {
            /* background-image: url('images/event/all4.jpg'); */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .card {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }


        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- ==== below javsscript is used to display the table (card) from 0 opacity to 100-->
    <script>
        window.addEventListener("load", function () {
            var card = document.querySelector(".card");
            card.style.opacity = "1";
        });

    </script>
    <div class="container-fluid mt-4">
        <?php include('event_include/message.php'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Details
                            <a href="event_include/event-create.php" class="btn btn-primary float-end"> Add Event</a>
                            <a href="index.php" class="btn btn-primary float-end mx-2"> Homepage</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Fees</th>
                                    <th>Maximum Capacity</th>
                                    <th>Tickets Booked</th>
                                    <th>Details</th>
                                    <th>Artist</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "Select * FROM `event`";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {

                                        // ======= getting the artist name =======  
                                
                                        include 'frequently_used/_dbconnect2.php';

                                        $artist_ID = $row['artist_id'];
                                        $sql = "SELECT artistname FROM artist WHERE artist_id= $artist_ID;";
                                        $result = mysqli_query($conn, $sql);
                                        $data = array();
                                        $artistrow = mysqli_fetch_assoc($result);
                                        $data[] = $artistrow;
                                        $name = $data[0]["artistname"];
                                        $row['artist_id'] = $name;

                                        // =====
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $row['id'] ?>
                                            </td>
                                            <td>
                                                <?= $row['eventdate'] ?>
                                            </td>
                                            <td>
                                                <?= $row['stime'] ?>
                                            </td>
                                            <td>
                                                <?= $row['etime'] ?>
                                            </td>
                                            <td>
                                                <?= $row['location'] ?>
                                            </td>
                                            <td>
                                                <?= $row['category'] ?>
                                            </td>
                                            <td>
                                                <?= $row['fees'] ?>
                                            </td>
                                            <td>
                                                <?= $row['mcapacity'] ?>
                                            </td>
                                            <td>

                                                <?= $row['enrolled'] ?>
                                            </td>
                                            <td>
                                                <?= $row['details'] ?>
                                            </td>
                                            <td>
                                                <!-- === see for each loop above <td> for the back end code of how to call the name of artist -->

                                                <?= $row['artist_id'] ?>

                                            </td>
                                            <td>
                                                <a href="event_include/event-view.php?id=<?= $row['id'] ?>"
                                                    class="btn btn-dark btn-sm">View</a>
                                                <a href="event_include/event-edit.php?id=<?= $row['id'] ?>"
                                                    class="btn btn-success btn-sm">Edit</a>

                                                <form action="event.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $row['id'] ?>" class=" btn btn-danger
                                                                    btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>