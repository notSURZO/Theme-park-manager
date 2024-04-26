<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Theme Park Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
   .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }
   
   
   body {
      background-image: url('https://scwcontent.affino.com/AcuCustom/Sitename/DAM/019/Theme_park_AdobeStock_222547272_1.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      backdrop-filter: blur(5px);
    }
    form,
    table {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      
    }

    h3,
    label {
      color: white;
    }
  </style>

</head>

<body>
		
	<!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_page_admin.php">THEME PARK MANAGER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav center">
          <a class="nav-link" href="home_page_admin.php">Home</a>
          <a class="nav-link"  href="ticket_admin.php">Manage Tickets</a>
          <a class="nav-link" href="theme_park_admin.php">Manage Theme Parks</a>
          
          <a class="nav-link"  href="rides_admin.php">Manage Rides</a>
          <a class="nav-link  active" aria-current="page" href="employees.php">Manage Employees</a>
          <a class="nav-link" href="shop_admin.php">Manage Shops</a>
          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
          
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
      <div class="row">

        <div class="col-md-6">
          <!-- Form to add employee -->
          <h3>Add Employee</h3>
          <form action="add_employee.php" method="POST">
            <div class="mb-3">
              <label for="employee_id" class="form-label">Employee ID</label>
              <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="mb-3">
              <label for="park_id" class="form-label">Park ID</label>
              <input type="number" class="form-control" id="park_id" name="park_id" required>
            </div>
            <div class="mb-3">
              <label for="salary" class="form-label">Salary</label>
              <input type="number" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="mb-3">
              <label for="job_description" class="form-label">Job Description</label>
              <input type="text" class="form-control" id="job_description" name="job_description" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="phone_number" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
          </form>
        </div>



        <div class="col-md-6">
          <!-- Form to delete employee -->
          <h3>Delete Employee</h3>
          <form action="delete_employee.php" method="POST">
            <div class="mb-3">
              <label for="employee_id" class="form-label">Employee ID</label>
              <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete Employee</button>
          </form>
        </div>
      </div>
    <hr>
    <!-- Table to display employees -->
    <h3>Current Employees</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Park ID</th>
            <th scope="col">Salary</th>
          <th scope="col">Job Description</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include database connection file
        require_once 'dbconnect.php';

        // Fetch and display employees
        $sql = "SELECT * FROM employees";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["employee_id"] . "</td>";
            echo "<td>" . $row["park_id"] . "</td>";
            echo "<td>" . $row["salary"] . "</td>";
            echo "<td>" . $row["job_description"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No employees found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>