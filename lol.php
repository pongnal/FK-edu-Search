<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
      One of three columns
    </div>
    <div class="col">
      One of three columns
    </div>
    <div class="col">
      One of three columns
    </div>
  </div>
</div>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

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

$sql = "SELECT DATE_FORMAT(PostDate, '%Y-%m') AS Month, COUNT(PostID) AS TotalPosts FROM post GROUP BY Month";
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
    legend: {display: false},
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

</body>
</html>
