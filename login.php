<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-edu search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
          <br>
          <div class="px-5 ms-xl-4">
            <img src="img/Emblem_of_Universiti_Malaysia_Pahang.png" alt="Logo" width="50" height="70">
            <span class="h1 fw-bold mb-0" style="font-family: Arial, Helvetica, sans-serif;">UMP Fk-Edu Search </span>
          </div>

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form style="width: 23rem;" method="POST">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
              <div class="pt-1 mb-4">
                <div class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" id="username" class="form-control form-control-lg" name="username"
                    style="border: 2px solid grey;" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control form-control-lg" name="password"
                    style="border: 2px solid grey;" />

                </div>

                <div class="form-outline mb-4">
                  <select class="form-select form-select-lg" id="userRole" name="userRole"
                    style="border: 2px solid grey;">
                    <option value="" disabled selected>Select type</option>
                    <option value="student">Student</option>
                    <option value="expert">Expert</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <br>
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit" name="updateStatus">Login</button>
                </div>
              </div>
            </form>
          </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/umpcanseleri.jpg" alt="Login image" class="w-100 vh-100"
            style="object-fit: cover; object-position: left;">
        </div>
      </div>
    </div>
  </section>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Retrieve the submitted username, password, and user role from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userRole = $_POST['userRole'];

    // Prepare the SQL statement based on the user role to fetch the user from the database
    $stmt = null;

    if ($userRole === 'admin') {
      $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();

      // Check if a row is returned from the query
      $result = $stmt->get_result();
      if ($result->num_rows == 1) {
        // User is authenticated
        $row = $result->fetch_assoc();
        $adminID = $row['adminID'];
        header("Location: adminIndex.php?adminID=$adminID");
        exit;
      } else {
        // User is not authenticated
        echo "Invalid username or password.";
      }
    } elseif ($userRole === 'expert') {
      $stmt = $conn->prepare("SELECT * FROM experts WHERE username = ? AND expertPassword = ?");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();

      // Check if a row is returned from the query
      $result = $stmt->get_result();
      if ($result->num_rows == 1) {
        // User is authenticated
        $row = $result->fetch_assoc();
        $expertID = $row['expertID'];

        //update
        $updateStmt = $conn->prepare("UPDATE experts SET accStatus = 'Online' WHERE expertID = ?");
        $updateStmt->bind_param("s", $expertID);
        $updateStmt->execute();
        header("Location: expertIndex.php?expertID=$expertID");
        exit;
      } else {
        // User is not authenticated
        echo "Invalid username or password.";
      }
    } elseif ($userRole === 'student') {
      $stmt = $conn->prepare("SELECT * FROM users WHERE userName = ? AND userPassword = ?");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();

      // Check if a row is returned from the query
      $result = $stmt->get_result();
      if ($result->num_rows == 1) {
        // User is authenticated
        $row = $result->fetch_assoc();
        $userID = $row['userID'];

        // update function
        $updateStmt = $conn->prepare("UPDATE users SET accStatus = 'Online' WHERE userID = ?");
        $updateStmt->bind_param("s", $userID);
        $updateStmt->execute();
        header("Location: userIndex.php?userID=$userID");
        exit;
      } else {
        // User is not authenticated
        echo "Invalid username or password.";
      }
    } else {
      // Invalid user role
      echo "Invalid user role.";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
  }

  ?>
</body>

</html>