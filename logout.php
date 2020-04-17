<?php
	setcookie('login', '', time() + (86400 * 30), "/");
	header("Location: /login.php");
?>