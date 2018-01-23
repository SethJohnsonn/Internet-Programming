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
$q  = $_GET['q'];
if ($q == '*'){
  $sql = "SELECT * FROM Movies";
}
else{
  $sql = "SELECT * FROM Movies WHERE genre = '".$q."'";
}


$result = mysqli_query($conn, $sql);
  echo "<form action ='' method='get' name='table'>";
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
  echo "</form";
  mysqli_close($conn);

?>
