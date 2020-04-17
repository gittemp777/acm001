<?php
// This is sparta! Makes huge kick..
// This is the main page.
if ($_COOKIE['login'] != 'true')
{
	header("Location: /login.php"); // bounce person if not logged in.
}

$servername = "localhost";
$username = "xssuser";
$password = "RSM777&&&rsm";

// Create connection
$conn = new mysqli($servername, $username, $password, "xsstest");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // show error message
}

$sql = "select * from messages";

$result = mysqli_query($conn, $sql);

?>
<h1>Post a message!</h1>
<form action="post.php" method="post">

  <div class="container">
	<textarea id="thepost" name="thepost">Enter your Message Here</textarea>

    <button type="submit">Post To Messages</button>

  </div>
  
</form>
<br /><br />
<hr />
<br /><h2>Messages</h2><br />
<?php

while($row = $result->fetch_assoc()) 
{
	echo $row["message"]."<br /><hr /><br />";
}

?>
<br /><br />
<hr />
<br /><a href="/logout.php">log out</a><br />