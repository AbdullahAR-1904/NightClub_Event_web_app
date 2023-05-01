<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// save the below code to the file artist_include/artist-create.php
include 'frequently_used/_dbconnect2.php';

// ============== below code if for update artist_include/artist-delete.php

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['delete']);
    echo $id;
    $sql = "DELETE FROM `artist` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Artist deleted successfully";
        header("Location: artist.php");
        exit(0);

    } else {
        $_SESSION['message'] = "Artist not deleted";
        header("Location: artist.php");
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

    <title>Hello, world!</title>

    <style>
        body {
            background-image: url('images/event/all4.jpg');
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
        <?php include('artist_include/message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Artist Details
                            <a href="artist_include/artist-create.php" class="btn btn-primary float-end"> Add Artist</a>
                            <a href="index.php" class="btn btn-primary float-end mx-2"> Homepage</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Artist ID</th>
                                    <th>Artist Name</th>
                                    <th>Artist Biography</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Artist Fees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "Select * FROM `artist`";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?= $row['artist_id'] ?>
                                            </td>
                                            <td>
                                                <?= $row['artistname'] ?>
                                            </td>
                                            <td>
                                                <?= $row['artistbio'] ?>
                                            </td>
                                            <td>
                                                <?= $row['fbemail'] ?>
                                            </td>
                                            <td>
                                                <?= $row['twemail'] ?>
                                            </td>
                                            <td>
                                                <?= $row['instaemail'] ?>
                                            </td>
                                            <td>
                                                <?= $row['artistfees'] ?>
                                            </td>
                                            <td>
                                                <a href="artist_include/artist-view.php?id=<?= $row['artist_id'] ?>"
                                                    class="btn btn-dark btn-sm">View</a>
                                                <a href="artist_include/artist-edit.php?id=<?= $row['artist_id'] ?>"
                                                    class="btn btn-success btn-sm">Edit</a>

                                                <form action="artist.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $row['artist_id'] ?>" class=" btn btn-danger
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