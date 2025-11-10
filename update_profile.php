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
$expert_id = $_SESSION['currentExpert'];

$sql = "UPDATE expert_profiles set expertise = '$expertise', research_areas = '$researchAreas', publications = '$publications', academic_status = '$academicStatus', social_media = '$socialMedia' WHERE expert_id = '$expert_id'";



if ($conn->query($sql) === TRUE) {
    ?>
        <script>
            alert("Profile update sucessfully!!!");
            window.location = 'expert_view.php';
        </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>