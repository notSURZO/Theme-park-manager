<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Theme Park Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  body{
      background-image: url(../myProject/img/tick.jpg);
      
      
     
      
    }

   

    
   .navbar-expand-lg .navbar-collapse {
      display: flex!important;
      justify-content: space-around;
      flex-basis: auto;
    }
</style>

  </head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_page_visitor.php">THEME PARK MANAGER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav center">
          <a class="nav-link" href="home_page_visitor.php">Home</a>
          <a class="nav-link"  href="ticket_visitor.php">Buy Tickets</a>
          <a class="nav-link" href="theme_park_visitor.php">Theme Parks</a>
          
          <a class="nav-link"  href="rides_visitor.php">Rides</a>
          <a class="nav-link active" aria-current="page" href="visitor_employees.php">Employees</a>
          <a class="nav-link" href="shop_visitor.php">Shops</a>
          

          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-4">

    <!-- Table to display employees -->
    <h3>Current Employees</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Park ID</th>
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