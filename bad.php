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

    <!-- //link modal -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    </nav>
    <br>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fk-edu-search";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Get the total number of complaints
    $queryTotal = "SELECT COUNT(*) AS totalComplaints FROM complaint";
    $resultTotal = $conn->query($queryTotal);
    $totalComplaints = 0;

    if ($resultTotal && $resultTotal->num_rows > 0) {
        $rowTotal = $resultTotal->fetch_assoc();
        $totalComplaints = $rowTotal["totalComplaints"];
    }

    // Get the total number of resolved complaints
    $queryResolved = "SELECT COUNT(*) AS resolvedComplaints FROM complaint WHERE complaintStatus = 'Resolved'";
    $resultResolved = $conn->query($queryResolved);
    $resolvedComplaints = 0;

    if ($resultResolved && $resultResolved->num_rows > 0) {
        $rowResolved = $resultResolved->fetch_assoc();
        $resolvedComplaints = $rowResolved["resolvedComplaints"];
    }

    // Get the total number of unresolved complaints
    $queryUnresolved = "SELECT COUNT(*) AS unresolvedComplaints FROM complaint WHERE complaintStatus = 'Pending'";
    $resultUnresolved = $conn->query($queryUnresolved);
    $unresolvedComplaints = 0;

    if ($resultUnresolved && $resultUnresolved->num_rows > 0) {
        $rowUnresolved = $resultUnresolved->fetch_assoc();
        $unresolvedComplaints = $rowUnresolved["unresolvedComplaints"];
    }

    $conn->close();
    ?>


    <div style="margin-bottom: 50px" class="centered-div">
        <div class="d-flex justify-content-center gap-3">
            <div style="background-color: #e8c3b9; color: #000000" class="card mb-2">
                <div style="text-align: center" class="card-body">
                    <h5 class="card-title">Total Number of Complaint</h5>
                    <p class="card-text display-4">
                        <?php echo $totalComplaints; ?>
                    </p>
                </div>
            </div>

            <div style="background-color: #00aba9; color: #ffffff" class="card mb-2">
                <div style="text-align: center" class="card-body">
                    <h5 class="card-title">Total Resolved Complaint</h5>
                    <p class="card-text display-4">
                        <?php echo $resolvedComplaints; ?>
                    </p>
                </div>
            </div>

            <div style="background-color: #b91d47; color: #ffffff" class="card mb-2">
                <div style="text-align: center" class="card-body">
                    <h5 class="card-title">Total Unresolved Complaint</h5>
                    <p class="card-text display-4">
                        <?php echo $unresolvedComplaints; ?>
                    </p>
                </div>
            </div>
        </div>
        <br>

        <div class="d-flex justify-content-center">
            <div id="chartContainer" style="width: 600px; height: 300px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>



        <script>
            // Fetch the data from the complaint database
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "fk-edu-search";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT complaintType, COUNT(*) AS total FROM complaint GROUP BY complaintType";
            $result = $conn->query($query);

            $complaintType = array();
            $complaintCount = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $complaintType[] = $row['complaintType'];
                    $complaintCount[] = $row['total'];
                }
            } else {
                echo "No data found";
            }

            $conn->close();
            ?>

            var xValues = <?php echo json_encode($complaintType); ?>;
            var yValues = <?php echo json_encode($complaintCount); ?>;
            var barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
            ];

            new Chart("myChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Pie Chart For Complaint Type",
                        fontSize: 18
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontSize: 16
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = data.labels[tooltipItem.index];
                                var lines = label.split('\n');
                                label = lines.join(' ');
                                return label + ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            }
                        }
                    }
                }
            });
        </script>
        <br>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Complaint Lists</li>
            </ol>
        </nav>

        <table class="table align-middle mb-0 bg-white table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Complaint ID</th>
                    <th>Complaint Date</th>
                    <th>Complaint Type</th>
                    <th>Complaint Description</th>
                    <th>Status</th>
                    <th>Action</th>
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
                $query = "SELECT * FROM complaint";

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $result = $conn->query($query);

                // Loop through the fetched user information and display it in the table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $ComplaintID = $row["complaintID"];
                        $ComplaintDate = $row["complaintDate"];
                        $ComplaintType = $row["complaintType"];
                        $ComplaintDescription = $row["complaintDescription"];
                        $ComplaintStatus = $row["complaintStatus"];
                        ?>
                        <tr>
                            <td>
                                <?php echo $ComplaintID; ?>
                            </td>
                            <td>
                                <?php echo $ComplaintDate; ?>
                            </td>
                            <td>
                                <?php echo $ComplaintType; ?>
                            </td>
                            <td>
                                <?php echo $ComplaintDescription; ?>
                            </td>
                            <td>
                                <?php echo $ComplaintStatus; ?>
                            </td>
                            <td>
                            <button class="btn btn-primary btn-show-modal" data-toggle="modal" data-target="#exampleModalCenter" data-complaintid="<?php echo $ComplaintID; ?>">
    <i class="fa fa-bar-chart"></i> View
</button>


                        

                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // If no reports are found in the database
                    ?>
                    <tr>
                        <td colspan="6">No reports found.</td>
                    </tr>
                    <?php
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User's Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="centered-div">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Complaint Details</li>
                            </ol>
                        </nav>
                        <table class="table align-middle mb-0 bg-white table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Complaint ID</th>
                                    <th>Complaint Date</th>
                                    <th>Complaint Type</th>
                                    <th>Complaint Description</th>
                                    <th>Complaint Status</th>


                                </tr>
                            </thead>
                            <!-- //sini -->
                            <tbody>
            <?php
            // Display the complaint data in the table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ComplaintID = $row["complaintID"];
                    $ComplaintDate = $row["complaintDate"];
                    $ComplaintType = $row["complaintType"];
                    $ComplaintDescription = $row["complaintDescription"];
                    $ComplaintStatus = $row["complaintStatus"];
                    ?>
                    <tr>
                        <td><?php echo $ComplaintID; ?></td>
                        <td><?php echo $ComplaintDate; ?></td>
                        <td><?php echo $ComplaintType; ?></td>
                        <td><?php echo $ComplaintDescription; ?></td>
                        <td><?php echo $ComplaintStatus; ?></td>
                        <td>
                            <button class="btn btn-primary btn-show-modal" data-toggle="modal" data-target="#exampleModalCenter" data-complaintid="<?php echo $ComplaintID; ?>">
                                <i class="fa fa-bar-chart"></i> View
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">No complaints found.</td>
                </tr>
                <?php
            }

            $conn->close();
            ?>
        </tbody>
    </table>
                        <br>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Resolved</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script>
        $(document).ready(function () {
            $('.btn-show-modal').click(function () {
                var complaintID = $(this).data('complaintid');
                $('#complaintDetails').empty(); // Clear previous data
                $.ajax({
                    type: 'GET',
                    url: 'get_complaint_details.php', // Replace with the path to your PHP file
                    data: { complaintID: complaintID },
                    success: function (response) {
                        $('#complaintDetails').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

</body>

</html>