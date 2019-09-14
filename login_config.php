<?php
$servername = "us-cdbr-iron-east-02.cleardb.net";
$username = "b8aa6613c91119";
$password = "42249f92";
$dbname = "heroku_b2b63234c9694dc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
