<?php
session_start();
include '../frequently_used/_dbconnect2.php';


// ============== below code if for create event_include/event-create.php
if (isset($_POST['save'])) {


    $email = $_POST['email'];
    $ticketno = $_POST['ticketno'];
    $eventid = $_POST['eventid'];
    
    echo $email;
    echo $ticketno;
    echo $eventid;
    
    $sql1 = "INSERT INTO `tickets`(`email`, `quantity`, `id`) VALUES ('$email',$ticketno,$eventid)";
    $query_run = mysqli_query($conn, $sql1);

    $sql2 = "SELECT `enrolled` FROM `event` WHERE id = $eventid";
    $result2 = mysqli_query($conn, $sql2);
     if ($result2) {
        $row = mysqli_fetch_assoc($result2);
        $no_Of_Enrolled = $row['enrolled'];
        
    }
    $no_Of_Enrolled2 = $no_Of_Enrolled + $ticketno;


    $sql3 = "UPDATE `event` SET `enrolled` = $no_Of_Enrolled2 WHERE id = $eventid;";
    $query_run2 = mysqli_query($conn, $sql3);



    if ($query_run) {
        echo  "Event created successfully";
        header("Location: ../index.php");
        // header("Location: bookticket.php");
        exit(0);
    } else {
        echo  "Event not created ";
        header("Location: bookticket.php");
        exit(0);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <!-- ======= getting the capacity of the event so that i can set maximum limit -->

  
    


    <?php
     include '_dbconnect.php';
    $email = $_SESSION['email'];
    $sql = "SELECT `username` FROM `user` WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // save the password value into a variable
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    } else {
        // handle the case where the email is not found in the table
        echo "No password found for email: " . $email;
    }
    ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <?php 
                include '../frequently_used/_dbconnect2.php';
                    if (isset($_GET['id'])) {
                        $event_id = $_GET['id'];

                        $query = "SELECT * FROM `event` WHERE `id` = '$event_id'";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            $ticketid = $row['id'];
                            $capacity = $row['mcapacity'];
                            $enrolled = $row['enrolled'];
                            $currentcapacity = $capacity - $enrolled;

                            ?>
                            <div class="card-header">
                            <h4>Reserve your tickets <a href="../index.php" class="btn btn-danger float-end">BACK</a></h4>
                            </div>
                            <div class="card-body">
                                <form action="bookticket.php" method="POST">
                                    <div class="mb-3">
                                        <label>Your email</label>
                                        <input type="text" name="email" id="email" 
                                            value="<?= $email ?>" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Your username</label>
                                        <input type="text" name="username" id="username" 
                                            value="<?= $username ?>" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Enter number of tickets</label>
                                        <input type="number" name="ticketno" id="ticketno" min="0" max="<?=$currentcapacity?>"
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Event ID</label>
                                    
                                        <input type="text" name="eventid" id="eventid" class="form-control" value="<?=$ticketid?>" readonly >
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="save" class="btn btn-primary">Book
                                            Ticket</button>
                                    </div>
                                </form>
                            </div>
    
                     <?php       
                        }
                    }
                ?>
                    


                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>
</body>
</html>