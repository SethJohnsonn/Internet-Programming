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
<script src="changeGenre.js"></script>
<title>Assignment 7</title>
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
    <form>
        <label for "selectGenre">Select a Genre to filter</label>
        <select name="selectGenre" id="selectGenre" onchange="changeGenre(this.value)">
          <option value="action">Action</option>
          <option value="comedy">Comedy</option>
          <option value="horror">Horror</option>
          <option value="drama">Drama</option>
          <option value="thriller">Thriller</option>
          <option value="romance">Romance</option>
          <option value="western">Western</option>
          <option value="documentary">Documentary</option>
          <option value="war">War</option>
          <option value="mystery">Mystery</option>
          <option value="other">Other</option>
        </select>
      </form>

	  <form action="queries.php" method="get" name="theform" id="theform">
      <fieldset name="general">
        <legend>General Info</legend>
          <div class="container">
      			<h2>Movie Name</h2>
      			<input type="text" name="moviename"><br><br>
      			<h2>Year</h2>
      			<input type="text" name="year"><br><br>
            <h2>Genre</h2>
            <select name="genre">
              <option value="action">Action</option>
              <option value="comedy">Comedy</option>
              <option value="horror">Horror</option>
              <option value="drama">Drama</option>
              <option value="thriller">Thriller</option>
              <option value="romance">Romance</option>
              <option value="western">Western</option>
              <option value="documentary">Documentary</option>
              <option value="war">War</option>
              <option value="mystery">Mystery</option>
              <option value="other">Other</option>
            </select>
          </fieldset>
            <br>
            <br>
        <fieldset name="general">
          <legend>Other</legend>
            <h2>Number of Awards</h2>
            <div class="container">
              <input type="radio" name="awards" value="none"> none<br>
              <input type="radio" name="awards" value="some"> 1 or 2<br>
              <input type="radio" name="awards" value="many"> 3 or more
            </div>
            <h2>Your Review</h2>
            <input type="checkbox" name="review" value="bad">It was bad<br>
            <input type="checkbox" name="review" value="justokay" >Just Okay<br>
            <input type="checkbox" name="review" value="liked">Liked It<br>
            <input type="checkbox" name="review" value="loved">Loved It<br>
        </div>
      </fieldset>
    			<br>
          <br>
      <div class="container" style="text-align: center;">
				<div class="btn-group">
          <button type="button" name="mod" value="mod" class="btn btn-info" onClick="modify()">Modify Movie</button>
					<button type="submit" name="add" value="add" class="btn btn-success">Add Movie</button>
					<button type="button" name="del" value="del" class="btn btn-danger" onClick="deletemovie()">Delete Movie</button>

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
    <div id="table"></div>
  </div>
</div>

</body>
</html>
