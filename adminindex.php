<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-edu search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
  <link rel="stylesheet" href="css/adminindex.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg bg-body-tertiary py-2">

    <div class="container-fluid">
      <img src="img/Emblem_of_Universiti_Malaysia_Pahang.png" alt="Logo" width="50" height="60">
      <br>
      <a class="navbar-brand pr-3" href="adminindex.php">FK-EduSearch</a>
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
              <li><a class="dropdown-item" href="createUser.php">Create</a></li>
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
  <br>
  <div class="centered-div">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Name</th>
          <th>Title</th>
          <th>Status</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                  alt=""
                  style="width: 45px; height: 45px"
                  class="rounded-circle"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Software engineer</p>
            <p class="text-muted mb-0">IT department</p>
          </td>
          <td>
            <span class="badge badge-success rounded-pill d-inline">Active</span>
          </td>
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              View
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                  class="rounded-circle"
                  alt=""
                  style="width: 45px; height: 45px"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">Alex Ray</p>
                <p class="text-muted mb-0">alex.ray@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Consultant</p>
            <p class="text-muted mb-0">Finance</p>
          </td>
          <td>
            <span class="badge badge-primary rounded-pill d-inline"
                  >Onboarding</span
              >
          </td>
          <td>Junior</td>
          <td>
            <button
                    type="button"
                    class="btn btn-link btn-rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark"
                    >
              View
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                  class="rounded-circle"
                  alt=""
                  style="width: 45px; height: 45px"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">Kate Hunington</p>
                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Designer</p>
            <p class="text-muted mb-0">UI/UX</p>
          </td>
          <td>
            <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
          </td>
          <td>Senior</td>
          <td>
            <button
                    type="button"
                    class="btn btn-link btn-rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark"
                    >
              View
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
  
    
</body>