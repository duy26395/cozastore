<?php
date_default_timezone_set("Asia/Bangkok"); // Thiết lập múi giờ chuẩn

// $servername = "localhost";
// $username = "duy263_cozastoreadmin";
// $password = "gw9P6n3RdVHYhbS";
// $dbname = "duy263_cozastore";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cozastore";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>