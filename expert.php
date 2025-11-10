<?php
  $randomNumber = mt_rand(1000, 9999);
  session_start();
  $_SESSION['currentExpert'] = $randomNumber;
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

    <form id="profileForm" action="save_profile.php" method="POST">
        <label for="expertise">Area of Expertise:</label>
        <input type="text" id="expertise" name="expertise">

        <label for="researchAreas">Research Areas:</label>
        <textarea id="researchAreas" name="researchAreas"></textarea>

        <label for="publications">List of Publications:</label>
        <textarea id="publications" name="publications"></textarea>

        <label for="academicStatus">Current Academic Status:</label>
        <input type="text" id="academicStatus" name="academicStatus">

        <label for="cv">CV:</label>
        <input type="file" id="cv" name="cv">

        <label for="socialMedia">Social Media Accounts:</label>
        <input type="text" id="socialMedia" name="socialMedia">

        <input type="submit" value="Save">
    </form>

    <script>
        // JavaScript code

        // Get the form element
        const profileForm = document.getElementById('profileForm');

        // Add an event listener to the form submission
        profileForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Retrieve form field values
            const expertise = document.getElementById('expertise').value;
            const researchAreas = document.getElementById('researchAreas').value;
            const publications = document.getElementById('publications').value;
            const academicStatus = document.getElementById('academicStatus').value;
            const socialMedia = document.getElementById('socialMedia').value;

            // Create a FormData object and append form field values
            const formData = new FormData();
            formData.append('expertise', expertise);
            formData.append('researchAreas', researchAreas);
            formData.append('publications', publications);
            formData.append('academicStatus', academicStatus);
            formData.append('socialMedia', socialMedia);

            console.log(formData); // Log form data

            // Send the form data to the server using Fetch API
            fetch('save_profile.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Display response from the server
                

                alert("Successfully Upload");
                $('#expertise').val('');
                $('#researchAreas').val('');
                $('#publications').val('');
                $('#academicStatus').val('');
                $('#socialMedia').val('');
                
                // Optionally, display a success message or perform additional tasks
            })
            .catch(error => {
                console.error('Error:', error); // Display error if any
            });
            });
    </script>


</body>

</html>
