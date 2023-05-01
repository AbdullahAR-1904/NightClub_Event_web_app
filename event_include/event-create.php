<?php
session_start();


include '../frequently_used/_dbconnect2.php';


// ============== below code if for create event_include/event-create.php
if (isset($_POST['save'])) {

    // getting the artist id
    $artist_id = $_POST["artist_id"];

    // getting the artist name from the artist table
    $sql = "SELECT artist_id FROM artist WHERE `artistname`='$artist_id'";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $row = mysqli_fetch_assoc($result);
    $data[] = $row;

    $artist_id = $data[0]['artist_id'];

    // $id = mysqli_real_escape_string($conn, $_POST['id']);
    $eventdate = mysqli_real_escape_string($conn, $_POST['eventdate']);
    $stime = mysqli_real_escape_string($conn, $_POST['stime']);
    $etime = mysqli_real_escape_string($conn, $_POST['etime']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $mcapacity = mysqli_real_escape_string($conn, $_POST['mcapacity']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);


    $query = "INSERT INTO `event`( `eventdate`, `stime`, `etime`, `location`, `category`, `fees`, `mcapacity`, `details`, `artist_id`) 
    VALUES ('$eventdate','$stime','$etime','$location','$category','$fees','$mcapacity','$details','$artist_id')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Event created successfully";
        header("Location: ../event.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Event not created ";
        header("Location: event-create.php");
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

    <title>Create Event</title>
</head>
<script>
    window.onload = function () {
        var maxDate = new Date();
        maxDate.setMonth(maxDate.getMonth() + 6);
        document.getElementById("eventdate").max = maxDate.toISOString().split("T")[0];
        document.getElementById("eventdate").min = new Date().toISOString().split("T")[0];
    };
</script>
<body>

    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Add
                            <a href="../event.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="event-create.php" method="POST">



                            <!-- <div class="mb-3">
                                <label>Event ID</label>
                                <input type="text" name="id" id="id" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label>Event Date</label>
                                <input type="date" name="eventdate" id="eventdate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Start Time</label>
                                <input type="time" name="stime" id="stime" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>End Time</label>
                                <input type="time" name="etime" id="etime" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" name="location" id="location" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label>Category</label>
                                <input type="text" name="category" id="category" class="form-control"
                                    placeholder="Comedy | Poetry | Music ">
                            </div>


                            <div class="mb-3">
                                <label>Fees</label>
                                <input type="number" name="fees" id="fees" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Maximum Capacity</label>
                                <input type="number" name="mcapacity" id="mcapacity" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Details</label>
                                <input type="text" name="details" id="details" class="form-control">
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
                            <br>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>
<!--  
<div class="form-group">
    <label for="eventdate">Date of event</label>
    <input type="date" class="form-control" id="eventdate" name="eventdate" required="required">
</div>

<div class="form-group">
    <label for="stime">Start time</label>
    <input type="time" class="form-control" id="stime" name="stime" required="required">
</div>

<div class="form-group">
    <label for="etime">End time</label>
    <input type="time" class="form-control" id="etime" name="etime" required="required">
</div>
<div>
    <label for="location">Event location</label>
    <input type="text" class="form-control" id="location" name="location" required="required">
</div><br>

<div class="form-group">
    <label for="category">Event Category</label> <br>

    <input type="radio" id="category" name="category" value="music">
    <label for="music">Music</label><br>


    <input type="radio" id="category" name="category" value="poetry">
    <label for="poetry">Poetry</label><br>

    <input type="radio" id="category" name="category" value="comedy">
    <label for="comedy">Comedy</label>
</div>



<div class="form-group">
    <input type="number" min="0" max="10000" step="1" name="fees" id="fees" required="required">
    <label for="fees">PKR per person</label>
</div>

<div class="form-group">
    <input type="number" id="mcapacity" name="mcapacity" min="1" max="10000">
    <label for="quantity">Maximum event capacity:</label>
</div>
<div>
    <label for="eventdetails">Event details</label>
    <input type="text" class="form-control" id="details" name="details" required="required">
</div><br>
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

<div class="mb-3">
    <button type="submit" name="save" class="btn btn-primary">Save Event</button>
</div>


</form>-->