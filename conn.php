<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laprint";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Er ging iets mis met de mysql connectie: " . mysqli_connect_error());
    }
?>