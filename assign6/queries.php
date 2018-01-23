<?php
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);
if($_SESSION['username'] == "")
{
        header("Location: index.php?error=2");
}

//new SQL database stuff
$servername = "localhost";
$username = "n01022499";
$password = "fall2017022499";
$dbname = "n01022499";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


echo '<script>console.log("Connected successfully")</script>';
mysqli_select_db($conn, 'n01022499');
$moviename = $_GET["moviename"];
$year = $_GET["year"];
$genre = $_GET["genre"];
$awards = $_GET["awards"];
$review = $_GET["review"];
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

if (isset($_GET['add'])) {
    addMovie($moviename, $year, $genre, $awards, $review, $conn);
}
elseif (isset($_GET['mod'])) {
    modifyMovie($moviename, $year, $genre, $awards, $review, $conn);
}
elseif (isset($_GET['del'])) {
  deleteMovie($id, $conn);
}
else{
  header("Location: client.php?error=1&display=1");
}

function addMovie($moviename, $year, $genre, $awards, $review, $conn){
    //added prepare statement to protect against SQL injections by specifying parameters and not allowing them to be escaped.
      $stmt = $conn->prepare("INSERT INTO Movies (moviename, year, genre, awards, review) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $moviename, $year, $genre, $awards, $review);
      if($stmt === FALSE) {
        die("Error: ".mysqli_error());
      }
      $stmt->execute();
      $stmt->close();

      header("Location: client.php?status=4");

      $conn->close();
}

function modifyMovie($moviename, $year, $genre, $awards, $review, $conn){
  $sql = "UPDATE Movies
          SET moviename ='$moviename',
              year = '$year',
              genre = '$genre',
              awards = '$awards',
              review = '$review'
          WHERE moviename = '$moviename'";

          $result = mysqli_query($conn, $sql);

          if ($result){
            header("Location: client.php?status=2");
          }
          else{
          echo ("Could not update data : " . mysqli_error($result) . " " . mysqli_errno($conn));
          }
}

function deleteMovie($id, $conn){
  $sql = "DELETE FROM Movies WHERE id = " .$id;
  $result = mysqli_query($conn, $sql);

  if($result){
    header("Location: client.php?status=3");
  }
  else{
    echo ("Could not delete data : " . mysqli_error($conn) . " " . mysqli_errno($conn));
    mysqli_close($conn);
    header("Location: client.php?status=1");
  }
}
 ?>
