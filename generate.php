<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fk-edu-search";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Generate the data for the report
$reportId = generateReportId();
$reportDate = date("2023-6-4"); // Current date
$status = generateStatus();

// Insert the generated data into the report table
$sql = "INSERT INTO report (reportID, reportDate, reportStatus) VALUES ('$reportId', '$reportDate', '$status')";
if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

// Helper function to generate a random report ID
function generateReportId()
{
    // Implement your logic to generate a report ID here
    // For example, you can generate a random alphanumeric string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $reportId = '';
    for ($i = 0; $i < 8; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $reportId .= $characters[$index];
    }
    return $reportId;
}

// Helper function to generate a random status
function generateStatus()
{
    // Implement your logic to generate a status here
    // For example, you can randomly select from a list of predefined statuses
    $statuses = ['Pending'];
    $index = rand(0, count($statuses) - 1);
    return $statuses[$index];
}
?>
