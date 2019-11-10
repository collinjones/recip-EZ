<?php
$servername = "us-cdbr-iron-east-02.cleardb.net";
$username = "b8aa6613c91119";
$password = "42249f92";
$dbname = "heroku_b2b63234c9694dc";
$link = mysqli_connect("us-cdbr-iron-east-02.cleardb.net", "b8aa6613c91119", "42249f92", "heroku_b2b63234c9694dc");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
