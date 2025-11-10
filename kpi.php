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
    <?php
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

    // Retrieve the count of all users
    $sqlCountAllUsers = "SELECT COUNT(*) AS total FROM users";
    $resultCountAllUsers = $conn->query($sqlCountAllUsers);
    if ($resultCountAllUsers && $resultCountAllUsers->num_rows > 0) {
        $rowAllUsers = $resultCountAllUsers->fetch_assoc();
        $totalUsersCount = $rowAllUsers['total'];
    } else {
        $totalUsersCount = 0;
    }

    // Retrieve the count of online users
    $sqlCountOnlineUsers = "SELECT COUNT(*) AS total FROM users WHERE accStatus = 'Online'";
    $resultCountOnlineUsers = $conn->query($sqlCountOnlineUsers);
    if ($resultCountOnlineUsers && $resultCountOnlineUsers->num_rows > 0) {
        $rowOnlineUsers = $resultCountOnlineUsers->fetch_assoc();
        $onlineUsersCount = $rowOnlineUsers['total'];
    } else {
        $onlineUsersCount = 0;
    }

    // Retrieve the count of all experts
    $sqlCountAllExperts = "SELECT COUNT(*) AS total FROM experts";
    $resultCountAllExperts = $conn->query($sqlCountAllExperts);
    if ($resultCountAllExperts && $resultCountAllExperts->num_rows > 0) {
        $rowAllExperts = $resultCountAllExperts->fetch_assoc();
        $totalExpertsCount = $rowAllExperts['total'];
    } else {
        $totalExpertsCount = 0;
    }

    // Retrieve the count of online experts
    $sqlCountOnlineExperts = "SELECT COUNT(*) AS total FROM experts WHERE accStatus = 'Online'";
    $resultCountOnlineExperts = $conn->query($sqlCountOnlineExperts);
    if ($resultCountOnlineExperts && $resultCountOnlineExperts->num_rows > 0) {
        $rowOnlineExperts = $resultCountOnlineExperts->fetch_assoc();
        $onlineExpertsCount = $rowOnlineExperts['total'];
    } else {
        $onlineExpertsCount = 0;
    }

    // Calculate the total online count
    $totalOnlineCount = $onlineExpertsCount + $onlineUsersCount;

    // Calculate the total count of all experts and users
    $totalCount = $totalExpertsCount + $totalUsersCount;

    $conn->close();
    ?>

    <!-- //php for offline -->

    <?php
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

    // Retrieve the count of all experts
    $sqlCountAllExperts = "SELECT COUNT(*) AS total FROM experts";
    $resultCountAllExperts = $conn->query($sqlCountAllExperts);
    if ($resultCountAllExperts && $resultCountAllExperts->num_rows > 0) {
        $rowAllExperts = $resultCountAllExperts->fetch_assoc();
        $totalExpertsCount = $rowAllExperts['total'];
    } else {
        $totalExpertsCount = 0;
    }

    // Retrieve the count of offline experts
    $sqlCountOfflineExperts = "SELECT COUNT(*) AS total FROM experts WHERE accStatus = 'Offline'";
    $resultCountOfflineExperts = $conn->query($sqlCountOfflineExperts);
    if ($resultCountOfflineExperts && $resultCountOfflineExperts->num_rows > 0) {
        $rowOfflineExperts = $resultCountOfflineExperts->fetch_assoc();
        $offlineExpertsCount = $rowOfflineExperts['total'];
    } else {
        $offlineExpertsCount = 0;
    }

    // Retrieve the count of all users
    $sqlCountAllUsers = "SELECT COUNT(*) AS total FROM users";
    $resultCountAllUsers = $conn->query($sqlCountAllUsers);
    if ($resultCountAllUsers && $resultCountAllUsers->num_rows > 0) {
        $rowAllUsers = $resultCountAllUsers->fetch_assoc();
        $totalUsersCount = $rowAllUsers['total'];
    } else {
        $totalUsersCount = 0;
    }

    // Retrieve the count of offline users
    $sqlCountOfflineUsers = "SELECT COUNT(*) AS total FROM users WHERE accStatus = 'Offline'";
    $resultCountOfflineUsers = $conn->query($sqlCountOfflineUsers);
    if ($resultCountOfflineUsers && $resultCountOfflineUsers->num_rows > 0) {
        $rowOfflineUsers = $resultCountOfflineUsers->fetch_assoc();
        $offlineUsersCount = $rowOfflineUsers['total'];
    } else {
        $offlineUsersCount = 0;
    }

    // Calculate the total offline count
    $totalOfflineCount = $offlineExpertsCount + $offlineUsersCount;

    // Calculate the total count of all experts and users
    $totalCount = $totalExpertsCount + $totalUsersCount;

    $conn->close();
    ?>

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
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                    <form class="d-flex" role="search" method="POST">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success me-2" type="submit">Search</button>
  <button class="btn btn-outline-danger" type="submit" name="updateStatus">Log Out</button>
</form>
        </nav>
        <br>
        <!-- Tabs navs -->
        <ul class="nav nav-tabs mb-2" id="ex1-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ex1-tab-1" data-bs-toggle="pill" data-bs-target="#ex1-tabs-1"
                    type="button" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">By Day</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ex1-tab-2" data-bs-toggle="pill" data-bs-target="#ex1-tabs-2" type="button"
                    role="tab" aria-controls="ex1-tabs-2" aria-selected="false">By Month</button>
            </li>

            <a style="text-decoration: none;" href="category.php">
                <li class="nav-item" role="presentation">

                    <button class="nav-link" id="ex1-tab-3" data-bs-toggle="pill" data-bs-target="#ex1-tabs-3"
                        type="button" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">By Department</button>
                </li>
            </a>

        </ul>
        <!-- Tabs navs -->
        <div>
            <!-- Tabs content -->
            <div class="tab-content" id="ex1-tabs-content">
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-xl-9">

                                <br>

                                <script
                                    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                                <canvas id="myChart1"
                                    style="width:100%;max-width:800px; display: block; margin: auto"></canvas>

                                <br>
                                <div style="margin-bottom: 30px" class="d-flex justify-content-center gap-3">
                                    <div style="background-color: #87CEEB; color: #000000" class="card mb-2"
                                        style="width: 300px;">
                                        <div style="text-align: center" class="card-body">
                                            <h5 class="card-title">Online Users</h5>
                                            <p class="card-text display-4">
                                                <?php echo $totalOnlineCount . '/' . $totalCount; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div style="background-color: #FFA07A; color: #000000" class="card mb-2"
                                        style="width: 300px;">
                                        <div style="text-align: center" class="card-body">
                                            <h5 class="card-title">Offline Users</h5>
                                            <p class="card-text display-4">
                                                <?php echo $totalOfflineCount . '/' . $totalCount; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div style="background-color:#CCCCCC; color: #000000" class="card mb-2"
                                        style="width: 300px;">
                                        <div style="text-align: center" class="card-body">
                                            <h5 class="card-title">Expired Users</h5>
                                            <p class="card-text display-4">1</p>
                                        </div>
                                    </div>

                                    <?php
                                    // Calculate User Availability
                                    $userAvailability = ($totalOnlineCount / $totalCount) * 100;
                                    ?>

                                    <div style="background-color: #90EE90; color: #000000" class="card mb-2"
                                        style="width: 300px;">
                                        <div style="text-align: center" class="card-body">
                                            <h5 class="card-title">User Availability</h5>
                                            <p class="card-text display-4">
                                                <?php echo round($userAvailability, 2); ?>%
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    // Fetch the data from the database using PHP
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "fk-edu-search";

                                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT postDateTime, COUNT(postID) AS TotalPosts FROM post GROUP BY postDateTime";
                                    $result = mysqli_query($conn, $sql);

                                    $PostDates = [];
                                    $PostCounts = [];

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $PostDates[] = $row['postDateTime'];
                                            $PostCounts[] = $row['TotalPosts'];
                                        }
                                    } else {
                                        echo "No data found";
                                    }

                                    mysqli_close($conn);
                                    ?>

                                    // Assign the PHP variables to JavaScript variables
                                    var xValues = <?php echo json_encode($PostDates); ?>;
                                    var yValues = <?php echo json_encode($PostCounts); ?>;
                                    var barColors = ["red", "green", "blue", "orange", "brown"];

                                    new Chart("myChart1", {
                                        type: "bar",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                backgroundColor: barColors,
                                                data: yValues
                                            }]
                                        },
                                        options: {
                                            legend: { display: false },
                                            title: {
                                                display: true,
                                                text: "Bar Chart: Total Number of Posts by Date"
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        min: 0,
                                                        max: 10,
                                                        stepSize: 1
                                                    },
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Total Number of Posts"
                                                    }
                                                }],
                                                xAxes: [{
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Date"
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- //lol -->
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-9">
                            <br>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <canvas id="myChart2"
                                style="width:100%;max-width:800px; display: block; margin: auto"></canvas>

                            <br>
                            <div style="margin-bottom: 30px" class="d-flex justify-content-center gap-3">
                                <div style="background-color: #87CEEB; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Online Users</h5>
                                        <p class="card-text display-4">
                                            <?php echo $totalOnlineCount . '/' . $totalCount; ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="background-color: #FFA07A; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Offline Users</h5>
                                        <p class="card-text display-4">
                                            <?php echo $totalOfflineCount . '/' . $totalCount; ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="background-color:#CCCCCC; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Expired Users</h5>
                                        <p class="card-text display-4">1</p>
                                    </div>
                                </div>

                                <?php
                                // Calculate User Availability
                                $userAvailability = ($totalOnlineCount / $totalCount) * 100;
                                ?>

                                <div style="background-color: #90EE90; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">User Availability</h5>
                                        <p class="card-text display-4">
                                            <?php echo round($userAvailability, 2); ?>%
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // Fetch the data from the database using PHP
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "fk-edu-search";

                                $conn = mysqli_connect($servername, $username, $password, $dbname);

                                // Check connection
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT DATE_FORMAT(postDateTime, '%Y-%m') AS Month, COUNT(PostID) AS TotalPosts FROM post GROUP BY Month";
                                $result = mysqli_query($conn, $sql);

                                $PostMonths = [];
                                $PostCounts = [];

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $PostMonths[] = $row['Month'];
                                        $PostCounts[] = $row['TotalPosts'];
                                    }
                                } else {
                                    echo "No data found";
                                }

                                mysqli_close($conn);
                                ?>

                                // Assign the PHP variables to JavaScript variables
                                var xValues = <?php echo json_encode($PostMonths); ?>;
                                var yValues = <?php echo json_encode($PostCounts); ?>;
                                var barColors = ["red", "green", "blue", "orange", "brown"];

                                new Chart("myChart2", {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: { display: false },
                                        title: {
                                            display: true,
                                            text: "Bar Chart: Total Number of Posts by Month"
                                        },
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    min: 0,
                                                    max: 10,
                                                    stepSize: 1
                                                },
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Total Number of Posts"
                                                }
                                            }],
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Month"
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <div class="container h-100" style="top: 50;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-9">
                            <canvas id="myChart3"
                                style="width:100%;max-width:800px; display: block; margin: auto"></canvas>
                            <br>
                            <div style="margin-bottom: 30px" class="d-flex justify-content-center gap-3">
                                <div style="background-color: #87CEEB; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Online Users</h5>
                                        <p class="card-text display-4">
                                            <?php echo $totalOnlineCount . '/' . $totalCount; ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="background-color: #FFA07A; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Offline Users</h5>
                                        <p class="card-text display-4">
                                            <?php echo $totalOfflineCount . '/' . $totalCount; ?>
                                        </p>
                                    </div>
                                </div>

                                <div style="background-color:#CCCCCC; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">Expired Users</h5>
                                        <p class="card-text display-4">1</p>
                                    </div>
                                </div>

                                <?php
                                // Calculate User Availability
                                $userAvailability = ($totalOnlineCount / $totalCount) * 100;
                                ?>

                                <div style="background-color: #90EE90; color: #000000" class="card mb-2"
                                    style="width: 300px;">
                                    <div style="text-align: center" class="card-body">
                                        <h5 class="card-title">User Availability</h5>
                                        <p class="card-text display-4">
                                            <?php echo round($userAvailability, 2); ?>%
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // Fetch the data from the database using PHP
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "fk-edu-search";

                                $conn = mysqli_connect($servername, $username, $password, $dbname);

                                // Check connection
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT postCategory, COUNT(postID) AS TotalPosts FROM post GROUP BY postCategory";
                                $result = mysqli_query($conn, $sql);

                                $PostCategories = [];
                                $PostCounts = [];

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $PostCategories[] = $row['postCategory'];
                                        $PostCounts[] = $row['TotalPosts'];
                                    }
                                } else {
                                    echo "No data found";
                                }

                                mysqli_close($conn);
                                ?>

                                // Assign the PHP variables to JavaScript variables
                                var xValues = <?php echo json_encode($PostCategories); ?>;
                                var yValues = <?php echo json_encode($PostCounts); ?>;
                                var barColors = ["red", "green", "blue", "orange", "brown"];

                                new Chart("myChart3", {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: { display: false },
                                        title: {
                                            display: true,
                                            text: "Bar Chart: Total Number of Posts by Category"
                                        },
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    min: 0,
                                                    max: 10,
                                                    stepSize: 1
                                                },
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Total Number of Posts"
                                                }
                                            }],
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Category"
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>