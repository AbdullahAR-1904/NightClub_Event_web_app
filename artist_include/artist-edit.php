<?php
session_start();
include '../frequently_used/_dbconnect2.php';



if (isset($_POST['update'])) {


    // $id = mysqli_real_escape_string($conn, $_POST['id']);
    $artist_id = mysqli_real_escape_string($conn, $_POST['artist_id']);
    $artistname = mysqli_real_escape_string($conn, $_POST['artistname']);
    $artistbio = mysqli_real_escape_string($conn, $_POST['artistbio']);
    $fbemail = mysqli_real_escape_string($conn, $_POST['fbemail']);
    $twemail = mysqli_real_escape_string($conn, $_POST['twemail']);
    $instaemail = mysqli_real_escape_string($conn, $_POST['instaemail']);
    $artistfees = mysqli_real_escape_string($conn, $_POST['artistfees']);


    $sql = "UPDATE `artist` SET  `artistname` = '$artistname', `artistbio` = '$artistbio', `fbemail` = '$fbemail', `twemail` = '$twemail',`instaemail` = '$instaemail', `artistfees` = '$artistfees' WHERE `artist_id` = '$artist_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Artist updated successfully";
        header("Location: ../artist.php");
        exit(0);

    } else {
        $_SESSION['message'] = "Artist not updated";
        header("Location: ../artist.php");
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

    <title>Artist Edit</title>
</head>
<body>
    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Artist Edit
                            <a href="../artist.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $artist_id = $_GET['id'];

                            $query = "SELECT * FROM `artist` WHERE `artist_id` = '$artist_id'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                ?>
                                <form action="artist-edit.php" method="POST">

                                    <div class="mb-3">

                                        <input type="text" name="artist_id" id="artist_id" class="form-control"
                                            value="<?= $row['artist_id']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Artist Name</label>
                                        <input type="text" name="artistname" id="artistname" class="form-control"
                                            value="<?= $row['artistname']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Artist Biography</label>
                                        <input type="text" name="artistbio" id="artistbio" class="form-control"
                                            value="<?= $row['artistbio']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Facebook Email</label>
                                        <input type="text" name="fbemail" id="fbemail" class="form-control"
                                            value="<?= $row['fbemail']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Twitter Email</label>
                                        <input type="text" name="twemail" id="twemail" class="form-control"
                                            value="<?= $row['twemail']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Instagram Email</label>
                                        <input type="text" name="instaemail" id="instaemail" class="form-control"
                                            value="<?= $row['instaemail']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <label>Artist Fees</label>
                                        <input type="text" name="artistfees" id="artistfees" class="form-control"
                                            value="<?= $row['artistfees']; ?>">
                                    </div>
                                    <div class=" mb-3">
                                        <button type="submit" name="update" class="btn btn-primary">Update Artist</button>
                                    </div>
                                </form>

                                <?php
                            } else {
                                echo '<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    Artist not found!
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