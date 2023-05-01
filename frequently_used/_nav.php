<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $access = true;
} else {
    $access = false;
}



include '_dbconnect.php';
$query = "Select * FROM `user` WHERE `status` = 0";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    $total = mysqli_num_rows($result);

}


echo '<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/night_vibes/index.php">Night Vibes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
  <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">';

// i am making a condition that if the user is not logged in, they wil see the option of login and sign up
if (!$access) {
    echo '
            <li class="nav-item active">
                <a class="btn btn-outline-light mx-2" href="/night_vibes/pastevent.php">Past Events</a>
            </li>
            <li class="nav-item ">
                <a class="btn btn-outline-light mx-2"  href="/night_vibes/login.php">Login</a>
            </li>
            <li class="nav-item active">
                <a class= "btn btn-outline-light mx-2" href="/night_vibes/signup.php">Sign up</a>
            </li>
            ';
}
// i am making a condition that if a user has logged in the they can see the logout button

if ($access) {
    echo '
            <li class="nav-item active">
            <a class="btn btn-outline-light mx-2" href="/night_vibes/frequently_used/new_user.php">' . $total . ' New Registrations</a>
            </li>
            <li class="nav-item active">
                <a class="btn btn-outline-light mx-2" href="/night_vibes/event.php">Event</a>
            </li>
            <li class="nav-item active">
                <a class=" btn btn-outline-light mx-2" href="/night_vibes/artist.php">Artist</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="/night_vibes/logout.php">logout</a>
            </li>
        ';
}
echo '
        </ul>
    </div>
</nav>';
?>