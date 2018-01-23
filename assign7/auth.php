<?php
	session_start();

	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=2");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['username'] = $username;

	if($username == "Seth" && $password == "lol")
	{
		header("Location: client.php");
	}else{
		header("Location: index.php?error=1");
	}

?>
