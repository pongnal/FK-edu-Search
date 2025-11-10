<?php
// Retrieve form data
$expertise = $_POST['expertise'];
$researchAreas = $_POST['researchAreas'];
$publications = $_POST['publications'];
$academicStatus = $_POST['academicStatus'];
$socialMedia = $_POST['socialMedia'];

// Database connection (adjust according to your database configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fk-edu-search";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$randomNumber = $_SESSION['currentExpert'];


// Prepare and execute the SQL query to insert data into the database
$sql = "INSERT INTO expert_profiles (expert_id,expertise, research_areas, publications, academic_status, social_media) 
        VALUES ('$randomNumber', '$expertise', '$researchAreas', '$publications', '$academicStatus', '$socialMedia')";

if ($conn->query($sql) === TRUE) {
    echo "Profile saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>



