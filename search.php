<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 800px;
      margin-left: auto;
      margin-top: 100px;
      margin-right: auto;
      colour: white;
      background-color: white;
    }

    table td,
    .hosting th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    table tr:nth-child(even) {
      background-color: #dddddd;
    }

    table tr:hover {
      background-color: rgb(37, 150, 190);
    }

    table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: black;
      color: black;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <br>
  <br>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card-header">
        <div class="d-flex">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-5 d-flex">
    <div class="form-group me-2">
      <input type="text" name="get_ReportID" class="form-control" placeholder="Enter Report ID" required>
    </div>
    <button type="submit" name="search_by_id" class="btn btn-primary">Search</button>
  </form>
<div>
  
</div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-5">
    <div class="form-group">
      <select name="sort_status" class="form-control" onchange="this.form.submit()">
        <option value="">-- Select Status --</option>
        <option value="investigation">Pending</option>
        <option value="resolved">Resolved</option>
      </select>
    </div>
  </form>
</div>


          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "fk-edu-search";

          $conn = mysqli_connect($servername, $username, $password, $dbname);

          // Check if the search form is submitted
          if (isset($_POST['search_by_id'])) {
            $reportID = $_POST['get_ReportID'];

            $query = "SELECT * FROM report WHERE ReportID = ?";

            // Prepare the statement
            $stmt = mysqli_prepare($conn, $query);

            // Bind the report ID parameter to the prepared statement
            mysqli_stmt_bind_param($stmt, "s", $reportID);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Get the result set
            $result = mysqli_stmt_get_result($stmt);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
              // Display the table header
              echo '<table class="table">
              <thead>
                <tr>
                  <th scope="col">Report ID</th>
                  <th scope="col">Report Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';

              // Fetch and display each row of the result
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['ReportID'] . '</td>';
                echo '<td>' . $row['ReportDate'] . '</td>';
                echo '<td>' . $row['ReportStatus'] . '</td>';
                echo '</tr>';
              }

              // Close the table
              echo '</tbody></table>';
            } else {
              echo 'No results found.';
            }

            // Close the statement
            mysqli_stmt_close($stmt);
          }
          ?>

          <?php
          // ...
          
          if (isset($_POST['sort_status'])) {
            $sortStatus = $_POST['sort_status'];

            // Modify the query based on the selected status
            if ($sortStatus === "Pending") {
              $query = "SELECT * FROM report WHERE ReportStatus = 'Pending' ORDER BY ReportDate DESC";
            } elseif ($sortStatus === "Resolved") {
              $query = "SELECT * FROM report WHERE ReportStatus = 'Resolved' ORDER BY ReportDate DESC";
            } else {
              $query = "SELECT * FROM report ORDER BY ReportDate DESC";
            }

            // Prepare the statement
            $stmt = mysqli_prepare($conn, $query);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Get the result set
            $result = mysqli_stmt_get_result($stmt);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
              // Display the table header
              echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Report ID</th>
                <th scope="col">Report Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>';

              // Fetch and display each row of the result
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['ReportID'] . '</td>';
                echo '<td>' . $row['ReportDate'] . '</td>';
                echo '<td>' . $row['ReportStatus'] . '</td>';
                echo '</tr>';
              }

              // Close the table
              echo '</tbody></table>';
            } else {
              echo 'No results found.';
            }

            // Close the statement
            mysqli_stmt_close($stmt);
          }

          ?>

          

        </div>
      </div>
    </div>
  </div>
</body>