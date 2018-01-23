<?php
      //new SQL database stuff
      $servername = "localhost";
      $username = "n01022499";
      $password = "fall2017022499";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password);

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      mysqli_select_db($conn, 'n01022499');
      echo '<script>console.log("Connected successfully")</script>';
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
  <div class="jumbotron text-center">
    <h1>
    <?php
            session_start();

            if($_SESSION['username'] == "")
            {
                    header("Location: index.php?error=2");
            }

      echo "Welcome back, " . $_SESSION['username'];
    ?>
  </h1>
  </div>
  <div class="container" style="text-align: center;">
    <p>Add a movie to our database!</p>
	  <form action="queries.php" method="get">
      <fieldset name="general">
        <legend>General Info</legend>
          <div class="container">
      			<h2>Database ID</h2>
      			<input type="text" name="id"><br><br>
          </fieldset>
    			<br>
          <br>
      <div class="container" style="text-align: center;">
				<div class="btn-group">
				  <button type="submit" name="del" value="del" class="btn btn-primary">Delete Movie</button>
				<!--	<button type="submit" name="add" value="add" class="btn btn-success">Add Movie</button> !-->
				<!--	<button type="submit" name="del" value="del" class="btn btn-danger">Delete Movie</button> !-->

				</div>
			</div>
		</form>
<br><br>
<div class="container" style="text-align: center;">
  <a href="logout.php" type="button" class="btn btn-default">Logout</a>
</div><br>
    <?php
        $error = $_GET['error'];
        if($error == 1){
          echo "Your Entry is Invalid";
        }
     ?>
  </div>

  <div class="row">
    <div class="col-md-12" style="text-align:center">
      <form action ="" method="get" name="table">
    					<?php
              $sql = "SELECT * FROM Movies";
              $result = mysqli_query($conn, $sql);

    						echo "<table class='table table-striped'>" ;
    						echo "<tr>";
    						echo "<th>ID</th>";
    						echo "<th>Name</th>";
    						echo "<th>Year</th>";
    						echo "<th>Genre</th>";
    						echo "<th>Awards</th>";
    						echo "<th>Review</th></tr>";
    						while($row = mysqli_fetch_row($result))
    						{
    							$id = $row[0];
    							$name = $row[1];
    							$genre = $row[2];
    							$awards = $row[3];
    							$review = $row[4];

    							echo "<tr>";
    							echo "<td>$id</td>";
    							echo "<td>$name</td>";
    							echo "<td>$genre</td>";
    							echo "<td>$awards</td>";
    							echo "<td>$review</td>";
    							echo "</tr>";
    						}
    						echo "</table>";
    						mysqli_close($conn);
    					?>
    				</form>
    </div>
  </div>

</body>
</html>
