<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: 300px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

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
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">User List</a></li>
                        </ul>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="myChart" style="width:100%;max-width:600px; display: block; margin: auto"></canvas>
    <br>
    <br>
    <br>
    <br>

    <nav aria-label="...">
        <ul class="pagination pagination-lg">
            <li class="page-item active" aria-current="page">
                <span class="page-link">Per Day</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">Per Week</a></li>
            <li class="page-item"><a class="page-link" href="#">Per Month</a></li>
        </ul>
    </nav>

    <div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Per Day</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Per Week</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#ccc;">
    <h2>Per Month</h2>
    <p>Some text..</p>
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

        $sql = "SELECT PostDate, COUNT(PostID) AS TotalPosts FROM post GROUP BY PostDate";
        $result = mysqli_query($conn, $sql);

        $PostDates = [];
        $PostCounts = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $PostDates[] = $row['PostDate'];
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

        new Chart("myChart", {
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
</body>