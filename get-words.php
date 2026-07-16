<?php
$servername = "sql104.infinityfree.com";
$username = "if0_42421602";
$password = "RLPGHOi4mvD";
$dbname = "if0_42421602_universe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Toggle all words when the eye button is clicked
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $result = $conn->query(
    "SELECT MAX(status) AS current_status FROM words"
  );

  $row = $result->fetch_assoc();
  $currentStatus = $row["current_status"];

  if ($currentStatus == 1) {
    $newStatus = 0;
  } else {
    $newStatus = 1;
  }

  $conn->query(
    "UPDATE words SET status = $newStatus"
  );

  $conn->close();
  exit;
}

$sql = "SELECT id, word FROM words  WHERE status = 1";

// Execute the SQL query
$result = $conn->query($sql);

// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<span class='received-word'>" .  $row["word"]. "</span>";
  }
}

$conn->close();
?>