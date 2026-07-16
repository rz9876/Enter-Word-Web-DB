<?php
$servername = "sql104.infinityfree.com";
$username = "if0_42421602";
$password = "RLPGHOi4mvD";
$dbname = "if0_42421602_universe";

$w = $_GET['visitor-word'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO words (id , word)
VALUES ('' , '$w')";

if ($conn->query($sql) === TRUE) {
   header("Location: one-word.html#show-words-section");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

