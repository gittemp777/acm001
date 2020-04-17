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

$user_email = $_POST['remail'];
$user_password = $_POST['rpassword'];

$sql = "select * from login where email='".$user_email."' and password='".$user_password."'";

echo "<br /><!-- SQL:".$sql." --><br />";

$result = $conn->query($sql);

if ($result->num_rows > 0){
	setcookie('login', 'true', time() + (86400 * 30), "/");
	header("Location: /index.php");
} else {
	if($user_email != '') {
		echo "You shall not pass!";
	}
}

echo "<br />";



?>

<form action="login.php" method="post">

  <div class="container">
    <label for="remail"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="remail" required>
<br />
    <label for="rpassword"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="rpassword" required>
<br />
    <button type="submit">Login</button>

  </div>
  
</form>



