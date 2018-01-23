<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Assignment 6</title>
</head>
<body>
<h1>Assignment 6 - PHP and SQL</h1>

<div class=container style="align: center;">
	<form name="login" method="post" action="auth.php">
	<h2 style="text-align: left">Login</h2>
	<br>
	<p>Username:
	<input type="text" name="username"></p>

	<p>Password:
	<input type="text" name="password"></p>

	<input type="submit">
	</form>
</div>
<?php
	$error = $_GET['error'];
	if($error == 1)
		echo "Invalid login";
	elseif ($error == 2)
		echo "You must log in first.";
?>
</body>
</html>
