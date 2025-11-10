<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateStatus'])) {
  // Assuming you have a MySQL database set up
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fk-edu-search";

  // Create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the user ID from the form data
  $userID = $_POST['userID'];

  // SQL query to update the status for the specified user ID
  $sql = "UPDATE users SET status = 'Online' WHERE userID = '$userID'";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully.";
  } else {
    echo "Error updating status: " . $conn->error;
  }

  // Close the connection
  $conn->close();
}
?>
