<?php
session_start();


include '../frequently_used/_dbconnect2.php';


// ============== below code if for create artist_include/artist-create.
if (isset($_POST['save'])) {
    // $id = ($conn, $_POST['id']);
    // $artist_id = mysqli_real_escape_string($conn, $_POST['artist_id']);
    $artistname = mysqli_real_escape_string($conn, $_POST['artistname']);
    $artistbio = mysqli_real_escape_string($conn, $_POST['artistbio']);
    $fbemail = mysqli_real_escape_string($conn, $_POST['fbemail']);
    $twemail = mysqli_real_escape_string($conn, $_POST['twemail']);
    $instaemail = mysqli_real_escape_string($conn, $_POST['instaemail']);
    $artistfees = mysqli_real_escape_string($conn, $_POST['artistfees']);

    echo $artistname;
    echo $artistbio;
    echo $fbemail;
    echo $twemail;
    echo $instaemail;
    echo $artistfees;




    $query = "INSERT INTO `artist`( `artistname`, `artistbio`, `fbemail`, `twemail`, `instaemail`, `artistfees`) 
    VALUES ('$artistname','$artistbio','$fbemail','$twemail','$instaemail','$artistfees')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "new 'Artist' created successfully";
        header("Location: ../artist.php");
        exit(0);
    } else {
        $_SESSION['message'] = "New 'Artist' not created ";
        header("Location: artist-create.php");
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

    <title>Create Artist</title>
</head>
<body>
    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Artist
                            <a href="../artist.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="artist-create.php" method="POST">



                            <!-- <div class="mb-3">
                                <label>Artist ID</label>
                                <input type="text" name="id" id="id" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label>Artist Name</label>
                                <input type="text" name="artistname" id="artistname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Artist Biography</label>
                                <input type="text" name="artistbio" id="artistbio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Facebook Email</label>
                                <input type="text" name="fbemail" id="fbemail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Twitter Email</label>
                                <input type="text" name="twemail" id="twemail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instagram Email</label>
                                <input type="text" name="instaemail" id="instaemail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Artist Fees</label>
                                <input type="number" name="artistfees" id="artistfees" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Save Artist</button>
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