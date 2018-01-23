<html>
<head>
<!--<link rel="stylesheet" type="text/css" href="../style.css">!-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Assignment 5</title>
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
	  <form action="admin.php" method="get">
			<label>Stock Ticker Symbol</label>
			<input type="text" name="ticker"><br>
			<label>Amount of Shares</label>
			<input type="text" name="shares"><br>
			<br>
			<br>
			<div class="container" style="text-align: center;">
				<div class="btn-group">
				  <button type="submit" name="mod" value="mod" class="btn btn-primary">Modify Stock</button>
					<button type="submit" name="add" value="add" class="btn btn-success">Add Stock</button>
					<button type="submit" name="del" value="del" class="btn btn-danger">Delete Stock</button>

				</div>
			</div>
		</form>

<div class="container">
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
    <?php
      $display = $_GET["display"];
      if ($display == 1) {
        echo '<table class="table table-hover">';
        $fc = file("userdata.dat");
        foreach($fc as $line) {
          $lineArray = explode(' ', $line);
          $totalValue += $lineArray[13];
          if (!strstr($line, $username))
            echo '<tr><td>'.$line.'</td></tr>';
        }
        echo '<tr><td>Total Value: $'.$totalValue.'</td></tr>';
        echo '</table>';
      }
    ?>
  </div>
</div>

</body>
</html>
