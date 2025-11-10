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
      <img src="ump.png" alt="Bootstrap" width="90" height="60">
      <br>
      <a class="navbar-brand pr-3" href="#">FK-EduSearch</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Manage Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Create</a></li>
              <li><a class="dropdown-item" href="#">Delete</a></li>
              <li><a class="dropdown-item" href="#">Update</a></li>
              <hr class="dropdown-divider">
              <li><a class="dropdown-item" href="#">User List</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="report.php">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="kpi.php">KPI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="complaint.php">Complaint</a>
          </li>
        </ul>
        <form class="d-flex" role="search" method="POST">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success me-2" type="submit">Search</button>
  <button class="btn btn-outline-danger" type="submit" name="updateStatus">Log Out</button>
</form>
  </nav>
  <br>

  <div class="centered-div">
  <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Post Details</li>
    </ol>
  </nav>
  <table class="table align-middle mb-0 bg-white table table-hover">
    <thead class="table-dark">
      <tr>
        <th>Post ID</th>
        <th>Post Date</th>
        <th>Post Category</th>
        <th>Post Topic</th>
        <th>Post Like</th>
        <th>Post Content</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Assuming you have a MySQL database set up
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "fk-edu-search";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $ReportDate = $_GET['date'];

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $PostID = $_POST['postID'];
        $updateStatusQuery = "UPDATE report SET `ReportStatus` = 'Resolved' WHERE ReportDate = '$ReportDate'";
    if ($conn->query($updateStatusQuery)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    echo '<script>window.location.href = "report.php";</script>'; // Redirect to report.php
    exit(); // Stop further execution after the updates}

      }
      // Check the connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Fetch post information from the database for the specified date
      $query = "SELECT * FROM post WHERE postDateTime = '$ReportDate'";
      $result = $conn->query($query);

      // Loop through the fetched post information and display it in the table rows
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $PostID = $row['postID'];
          $PostDate = $row['postDateTime'];
          $PostCategory = $row['postCategory'];
          $PostTopic = $row['postTopic'];
          $PostLike = $row['postLike'];
          $PostContent = $row['postContent'];
          ?>
          <tr>
            <td><?php echo $PostID; ?></td>
            <td><?php echo $PostDate; ?></td>
            <td><?php echo $PostCategory; ?></td>
            <td><?php echo $PostTopic; ?></td>
            <td><?php echo $PostLike; ?></td>
            <td><?php echo $PostContent; ?></td>
          </tr>
          <?php
        }
      } else {
        ?>
        <tr>
          <td colspan="6">No posts found for the specified date.</td>
        </tr>
        <?php
      }

      $conn->close();
      ?>

    </tbody>
  </table>
  <br>
  <form method="POST">
                    <input type="hidden" name="postID" value="<?php echo $PostID; ?>">
                    <a href="report.php" class="btn btn-primary">Back</a>
                    <button type="submit" name="updateStatus" class="btn btn-primary"  style="background-color: #90EE90;color: #000000;">Resolve</button>
                </form>
</div>

</body>

</html>