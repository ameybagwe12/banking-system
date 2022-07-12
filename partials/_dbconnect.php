<?php

// Connecting to the database

// $servername = "sql106.epizy.com";
// $username = "epiz_32152794";
// $password = "W4qrZggYGlRraRu";
// $database = "epiz_32152794_bank";

$servername = "localhost";
$username = "root";
$password = "";
$database = "bank";


$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successfull
if (!$conn) {
    die('Failed to connect: ' . mysqli_connect_error());
}
