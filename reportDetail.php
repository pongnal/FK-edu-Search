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
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-2">

        <div class="container-fluid">
            <img src="ump.png" alt="Bootstrap" width="90" height="60">
            <br>
            <a class="navbar-brand pr-3" href="#">FK-EduSearch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
$ReportDate = $_GET['date'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $PostID = $_POST['postID'];

    // Update the Report ID in the report table
    $updateQuery = "UPDATE report SET ReportID = (SELECT PostID FROM post WHERE PostDate = '$ReportDate') WHERE ReportDate = '$ReportDate'";
    if ($conn->query($updateQuery)) {
        echo "Report ID updated successfully.";
    } else {
        echo "Error updating Report ID: " . $conn->error;
    }

    // Update the status in the report table
    $updateStatusQuery = "UPDATE report SET `ReportStatus` = 'Resolved' WHERE ReportDate = '$ReportDate'";
    if ($conn->query($updateStatusQuery)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    echo '<script>window.location.href = "report.php";</script>'; // Redirect to report.php
    exit(); // Stop further execution after the updates}
}

$query = "SELECT * FROM post WHERE PostDate = '$ReportDate'";
echo '<table> 
    <tr> 
        <td> <b>Post ID</b> </td>
        <td> <b>Post Date</b> </td> 
        <td> <b>Post Category</b> </td> 
        <td> <b>Post Topic</b> </td> 
        <td> <b>Post Like</b> </td>
        <td> <b>Post Content</b></td>
    </tr>
    </style>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $PostID = $row["PostID"];
        $PostDate = $row["PostDate"];
        $PostCategory = $row["PostCategory"];
        $PostTopic = $row["PostTopic"];
        $PostLike = $row["PostLike"];
        $PostContent = $row["PostContent"];

        echo '<tr> 
                <td>' . $PostID . '</td>
                <td>' . $PostDate . '</td>
                <td>' . $PostCategory . '</td> 
                <td>' . $PostTopic . '</td> 
                <td>' . $PostLike . '</td> 
                <td>' . $PostContent . '</td> 
            </tr>';
    }
    $result->free();
}

$conn->close();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <form method="POST">
                    <input type="hidden" name="postID" value="<?php echo $PostID; ?>">
                    <button type="submit" name="updateStatus" class="btn btn-primary">Resolve</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>