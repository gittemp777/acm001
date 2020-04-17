<?php

$servername = "localhost";
$username = "xssuser";
$password = "RSM777&&&rsm";

// Create connection
$conn = new mysqli($servername, $username, $password, "xsstest");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$thepost = $_POST['thepost'];

$sql = "insert into messages (message, user_id) values ('".$thepost."',0)";

echo $sql;

mysqli_query($conn, $sql);

header("Location: /index.php");
?>