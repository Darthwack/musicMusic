<?php
//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "indymusic";
$tblArtists = "artists";
$tblShows = "shows";
$tblVenues = "venues";
$tblUsers = "users";

//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);


//Handle connection errors
if (mysqli_connect_errno() != 0) {
    $errno = mysqli_connect_errno();
    $errmsg = mysqli_connect_error();
    die("Connect Failed with: ($errno) $errmsg<br/>\n");
}
?>