<?php
session_start();
include '../frequently_used/_dbconnect2.php';



if (isset($_POST['update'])) {



    // getting the artist id
    $artist_id = $_POST["artist_id"];

    // getting the artist name from the artist table
    $sql = "SELECT artist_id FROM artist WHERE `artistname`='$artist_id'";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $row = mysqli_fetch_assoc($result);
    $data[] = $row;

    $artist_id = $data[0]['artist_id'];

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $eventdate = mysqli_real_escape_string($conn, $_POST['eventdate']);
    $stime = mysqli_real_escape_string($conn, $_POST['stime']);
    $etime = mysqli_real_escape_string($conn, $_POST['etime']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $mcapacity = mysqli_real_escape_string($conn, $_POST['mcapacity']);
    $enrolled = mysqli_real_escape_string($conn, $_POST['enrolled']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    // $artist_id = mysqli_real_escape_string($conn, $_POST['artist_id']);

    $sql = "UPDATE `event` SET `eventdate` = '$eventdate', `stime` = '$stime', `etime` = '$etime', `location` = '$location', `category` = '$category',`fees` = '$fees', `mcapacity` = '$mcapacity', `enrolled` = '$enrolled',  `details` = '$details', `artist_id` = '$artist_id' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "Event updated successfully";
        header("Location: ../event.php");
        exit(0);

    } else {
        $_SESSION['message'] = "Event not updated";
        header("Location: ../event.php");
        exit(0);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Event!</title>
</head>

<body>
    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Edit
                            <a href="../event.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $event_id = $_GET['id'];

                            $query = "SELECT * FROM `event` WHERE `id` = '$event_id'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                $capacity = $row['mcapacity'];
                                $enrolled = $row['enrolled'];
                                $currentcapacity = $capacity - $enrolled;

                                ?>
                                <form action="event-edit.php" method="POST">

                                    <div class="mb-3">

                                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $row['id']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>Event Date</label>
                                        <input type="date" name="eventdate" id="eventdate" class="form-control"
                                            value="<?= $row['eventdate']; ?>">
                                        <script>
                                            window.onload = function () {
                                                var maxDate = new Date();
                                                maxDate.setMonth(maxDate.getMonth() + 6);
                                                document.getElementById("eventdate").max = maxDate.toISOString().split("T")[0];
                                                document.getElementById("eventdate").min = new Date().toISOString().split("T")[0];
                                            };
                                        </script>
                                    </div>
                                    <div class=" mb-3">
                                        <label>Start Time</label>
                                        <input type="text" name="stime" id="stime" class="form-control"
                                            value="<?= $row['stime']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>End Time</label>
                                        <input type="text" name="etime" id="etime" class="form-control"
                                            value="<?= $row['etime']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control"
                                            value="<?= $row['location']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Category</label>
                                        <input type="text" name="category" id="category" class="form-control"
                                            value="<?= $row['category']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Fees</label>
                                        <input type="text" name="fees" id="fees" class="form-control"
                                            value="<?= $row['fees']; ?>">
                                    </div>

                                    <div class=" mb-3">
                                        <label>Maximum Capacity</label>
                                        <input type="text" name="mcapacity" id="mcapacity" class="form-control"
                                            value="<?= $row['mcapacity']; ?>">
                                    </div>

                                    <div class=" mb-3">
                                        <label>Tickets Booked</label>
                                        <input type="number" name="enrolled" id="enrolled" class="form-control"placeholder=" <?= $row['enrolled']; ?>"
                                            max="<?= $row['mcapacity']; ?>" min="0" value=" <?= $row['enrolled']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Details</label>
                                        <input type="text" name="details" id="details" class="form-control"
                                            value="<?= $row['details']; ?>">
                                    </div>



                                    <div class="form-group ">
                                        <label for="artist_id">Choose Artist</label>
                                        <select id="artist_id" name="artist_id" class="form-control">
                                            <option selected>Choose ...</option>


                                            <?php

                                            // below code is used to get values from artist table and store them in $ row variable
                                            // then no matter how much the values are stored in the database, all the options will be displayed
                                            include 'frequently_used/_dbconnect2.php';
                                            $sql = "SELECT * FROM artist;";
                                            $result = mysqli_query($conn, $sql);
                                            $resultarrived = mysqli_num_rows($result);
                                            if ($resultarrived > 0) {
                                                // while ($row = mysqli_fetch_assoc($result)) {
                                                //     echo $row['artistname'] . "<br>";
                                                //     $names[] = $row['artistname'];
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    // echo "Value " . $count . ": " . $rowid['artist_id'] . "<br>";
                                                    echo "<option>" . $row['artistname'] . "</option>";
                                                    $count++;
                                                }
                                            }
                                            $count = 1;

                                            ?>

                                        </select>
                                    </div>

                                    <div class=" mb-3">
                                        <button type="submit" name="update" class="btn btn-primary">Update Event</button>
                                    </div>
                                </form>

                                <?php
                            } else {
                                echo '<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    Event not found!
                                </div>';
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>