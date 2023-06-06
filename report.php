<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #border2 {
      margin-left: auto;
      margin-right: auto;
      border: 1px solid black;
      padding: 10px;
      border-radius: 2px;
      width: 800px;
    }

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
      background-color: white;
      color: white;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous">
  </script>

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
            <a class="nav-link active" aria-current="page" href="report.php">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="graph.php">KPI</a>
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
  

      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "fk-edu-search";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $query = "SELECT * FROM report";


      echo '<table> 
        <tr> 
            <td> <b>Report ID</b> </td> 
            <td> <b>Report Date</b> </td> 
            <td> <b>Status</b> </td>
            <td> <b>Action</b></td>
        </tr>
        
        </style>';

      if ($result = $conn->query($query)) {

        while ($row = $result->fetch_assoc()) {
          $ReportID = $row["ReportID"];
          $ReportDate = $row["ReportDate"];
          $ReportStatus = $row["ReportStatus"];

          echo '<tr> 
                    <td>' . $ReportID . '</td>
                    <td>' . $ReportDate . '</td>
                    <td>' . $ReportStatus . '</td>
                    <td><a href="reportDetail.php?date=' . $ReportDate . '">View</a></td>
                    </tr>';
        }
        $result->free();
      }
      ?>
</body>