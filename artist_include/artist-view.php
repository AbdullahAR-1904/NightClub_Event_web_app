<?php
session_start();
include '../frequently_used/_dbconnect2.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>View Artist</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Artist View
                            <a href="../artist.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $artist_id = $_GET['id'];


                            $query = "SELECT * FROM `artist` WHERE `artist_id` = $artist_id;";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                ?>

                                <div class="mb-3">
                                    <label>Aritst ID</label>
                                    <p class="form-control">
                                        <?= $row['artist_id']; ?>
                                    </p>
                                </div>
                                <div class=" mb-3">
                                    <label>Artist Name</label>
                                    <p class="form-control">
                                        <?= $row['artistname']; ?>
                                    </p>
                                </div>
                                <div class=" mb-3">
                                    <label>Artist Biography</label>
                                    <p class="form-control">
                                        <?= $row['artistbio']; ?>
                                    </p>
                                </div>
                                <div class=" mb-3">
                                    <label>Facebook Email</label>
                                    <p class="form-control">
                                        <?= $row['fbemail']; ?>
                                    </p>
                                </div>
                                <div class=" mb-3">
                                    <label>Twitter Email</label>

                                    <p class="form-control">
                                        <?= $row['twemail']; ?>
                                    </p>
                                </div>
                                <div class=" mb-3">
                                    <label>Instagram Email</label>
                                    <p class="form-control">
                                        <?= $row['instaemail']; ?>
                                    </p>
                                </div>

                                <div class=" mb-3">
                                    <label>Artist Fees</label>
                                    <p class="form-control">
                                        <?= $row['artistfees']; ?>
                                    </p>

                                </div>


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