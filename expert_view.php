<?php
  session_start();
  $expert_id = $_SESSION['currentExpert'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Expert Profile Management</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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

    <h1>Expert Profile Management</h1>
    <?php 
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
        $sql4 = "SELECT * FROM expert_profiles WHERE expert_id = '$expert_id'";
        $result4 = mysqli_query($conn,$sql4) or die ("Could not execute query in homepage");
        $expertinfo = mysqli_fetch_assoc($result4);
    ?>

    <div style="margin-left: 35%;margin-right: 35%;">
        <label for="expertise">Area of Expertise:</label>
        <strong><?php echo $expertinfo['expertise'] ?></strong>

        <label for="researchAreas">Research Areas:</label>
        <strong><?php echo $expertinfo['research_areas'] ?></strong>

        <label for="publications">List of Publications:</label>
        <strong><?php echo $expertinfo['publications'] ?></strong>

        <label for="academicStatus">Current Academic Status:</label>
        <strong><?php echo $expertinfo['academic_status'] ?></strong>

        <label for="cv">CV:</label>
        <input type="file" id="cv" name="cv">

        <label for="socialMedia">Social Media Accounts:</label>
        <strong><?php echo $expertinfo['social_media'] ?></strong>

        
        <a href="expert_edit.php"><input type="submit" value="Update"></a>
        
    </div>
    <button style="border-color:azure;" type="button" class="rounded-5" data-toggle="modal" data-target="#editProfileModal">Update</i></button>
   
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form action="../../Model/Expert/profileUpdate.php?actionType=formUpdate" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <!-- Name -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $userinfo['user_name']; ?>" >
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $userinfo['user_email']; ?>">
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="phone number">Phone Number</label>
              <input type="tel" class="form-control" id="phoneNum" name="phoneNum" value="<?php echo $userinfo['user_phoneNum']; ?>">
            </div>

            <!-- Age -->
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" name="age" value="<?php echo $userinfo['user_age']; ?>">
            </div>

            <!-- Academic Level -->
            <div class="form-group">
              <label for="academic-level">Academic Level</label>
              <input type="text" class="form-control" id="academic-level" name="academic-level" value="<?php echo $userinfo['user_academicStatus']; ?>">
            </div>

            <!-- Research Area -->
            <div class="form-group">
              <label for="research-area">Research Area</label>
              <textarea class="form-control" id="research-area" rows="3" name="research-area"><?php echo $userinfo['user_researchArea']; ?></textarea>
            </div>

            <!-- Social Media Link -->
            <div class="form-group">
              <label for="social-media-link">Social Media Link</label>
              <input type="text" class="form-control" id="social-media-link" name="social-media-link" value="<?php echo $userinfo['user_socialMedia']; ?>">
            </div>

            <!-- Cover Letter Document -->
            <div class="form-group">
              <label for="cover-letter">Cover Letter Document</label>
              <input type="file" name="cover-letter" id="cover-letter" accept="application/pdf">
            </div>
              
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Validate</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>

</html>
