<?php
        session_start();

        if($_SESSION['username'] == "")
        {
                header("Location: index.php?error=2");
        }

?>

<html>
<head>
<!--<link rel="stylesheet" type="text/css" href="../style.css">!-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Assignment 6</title>
</head>
<body>
  <img src="ERD.png">
</body>
</html>
