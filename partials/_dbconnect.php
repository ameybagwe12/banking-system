<?php

// Connecting to the database

$username = "root";
$servername = "localhost";
$password = "";
$database = "bank";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successfull
if (!$conn) {
    die('Failed to connect: ' . mysqli_connect_error());
}
