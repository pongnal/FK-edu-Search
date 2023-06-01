<!DOCTYPE html>
<html>
<head>
  <title>Sum Calculation Example</title>
</head>
<body>
  <button onclick="window.location.href='?action=calculate'">Calculate Sum</button>
  <p  id="result"></p>

  <?php
  if (isset($_GET['action']) && $_GET['action'] == 'calculate') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fk-edu-search";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to retrieve the sum from the 'Post' table
    $sql = "SELECT SUM(PostLike) AS total_sum FROM post GROUP BY PostDate";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $totalSum = $row['total_sum'];
        echo "Total Like: " . $totalSum;
    } else {
        echo "No results found.";
    }

    mysqli_close($conn);
  }
  ?>

<?php
  if (isset($_GET['action']) && $_GET['action'] == 'calculate') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fk-edu-search";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to retrieve the sum from the 'Post' table
    $sql = "SELECT SUM(PostID) AS total_sum FROM post GROUP BY PostDate";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $totalSum = $row['total_sum'];
        echo "Total Post: " . $totalSum;
    } else {
        echo "No results found.";
    }

    mysqli_close($conn);
  }
  ?>

</body>
</html>
