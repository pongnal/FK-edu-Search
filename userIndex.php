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
  $sql = "UPDATE users SET accStatus = 'Offline' WHERE userID = ?";
  $updateStmt = $conn->prepare($sql);
  $updateStmt->bind_param("s", $userID);
  $updateStmt->execute();

  // Close the prepared statement
  $updateStmt->close();

  // Close the database connection
  $conn->close();

  // Redirect to the login page
  header("Location: login.php?userID=$userID");
  exit;
} else {
  // Invalid request or button not clicked
  // Handle accordingly
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-edu search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/adminindex.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg bg-body-tertiary py-2">
    <div class="container-fluid">
      <img src="img/Emblem_of_Universiti_Malaysia_Pahang.png" alt="Logo" width="50" height="60">
      <br>
      <a class="navbar-brand pr-3" href="#">FK-EduSearch</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Manage Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Create</a></li>
              <li><a class="dropdown-item" href="#">Delete</a></li>
              <li><a class="dropdown-item" href="#">Update</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">User List</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">KPI</a>
          </li>
        </ul>
        <form class="d-flex" role="search" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          <button class="btn btn-outline-success" type="submit" name="updateStatus">Log Out</button>
        </form>
      </div>
    </div>
  </nav>
  <br>
</body>

</html>
