<?php
   session_start();
   $a_id = $_SESSION['admin_id'];
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Rides</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
  <style>
        .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }
    body { 
        background-image: url(../myProject/img/bg.jpg);
        background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      backdrop-filter: blur(5px);
      }
      .row {
        padding-left: 20px;

      }
      h1,label{
        align-self: flex-end; padding: 0.5rem;
    font-size: 2rem;
    line-height: 1;font-weight: 600; 
    -webkit-text-stroke: 0.4px white;
      }

    form,table {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      
    }

    #myInput {
  
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
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
          
          <a class="nav-link active" aria-current="page" href="rides_admin.php">Manage Rides</a>
          <a class="nav-link" href="employees.php">Manage Employees</a>
          <a class="nav-link" href="shop_admin.php">Manage Shops</a>
          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
          
        </div>
      </div>
    </div>
  </nav>
<br>
<h1>ADD RIDES</h1>
<br>
<form method= "POST">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label"><h4>Ride ID</h4></label>
    <div class="col-sm-10">
      <input type="number" name="r_id" class="form-control" id="inputEmail3">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Ride Name</h4></label>
    <div class="col-sm-10">
      <input type="text" name="r_name" class="form-control" id="inputPassword3">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Park Name</h4></label>
    <div class="col-sm-10">
      <input type="text" name="p_name" class="form-control" id="inputPassword3">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Maintenance Cost</h4></label>
    <div class="col-sm-10">
      <input type="int" name="m_cost" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Age Limit</h4></label>
    <div class="col-sm-10">
      <input type="text" name="age" class="form-control" id="inputPassword3">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Ticket Price</h4></label>
    <div class="col-sm-10">
      <input type="number" name="t_price" class="form-control" id="inputPassword3" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>IMAGE URL</h4></label>
    <div class="col-sm-10">
      <input type="text" name="image" class="form-control" id="inputPassword3">
    </div>
  </div>


  <br>
  <button type="submit" name="add" class="btn btn-success" style="margin-left: 20px;">Add Ride</button>
</form>
<br>
<br>
<br>
<br>
<h1>DELETE RIDES</h1>
<br>
<form method= "POST">
  <div class="row mb-3" >
  <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Ride ID</h4></label>
  <div class="col-sm-10">
    <input type="number" name= "rd_id" class="form-control" id="inputPassword3">
    </div>
    </div>

    </span>
    
 

    <button type="submit" name="del" class="btn btn-danger" style="margin-left: 20px;">Delete Ride</button>
  </form>
<?php 
      include('dbconnect.php'); 
      if(isset($_POST['add'])){
        $r_id = $_POST['r_id'];
        $r_name = $_POST['r_name'];
        $a_lim = $_POST['age'];
        $m_cost = $_POST['m_cost'];
        $p_name = $_POST['p_name'];
        $img = $_POST['image'];
        $price = $_POST['t_price'];


        $query = mysqli_query($conn, "INSERT INTO rides_admin(ride_id, ride_name, maintenance_cost, age_limit, park_name, image_url, ticket_price, admin_id) VALUES ('$r_id', '$r_name', '$m_cost', '$a_lim', '$p_name', '$img', '$price', '$a_id')");

        if($query) {
          echo "<script>alert('RIDE ADDED SUCCESSFULLY')</script>";
        } else {
          echo "<script>alert('there is an error')</script>";
        }
      }

      if(isset($_POST['del'])){
              $rd_id = $_POST['rd_id'];
              
      
              $q = mysqli_query($conn, "DELETE FROM rides_admin
              WHERE ride_id = $rd_id ");
              
      
              if($q) {
                echo "<script>alert('RIDE REMOVED SUCCESSFULLY ')</script>";
              } else {
                echo "<script>alert('there is an error')</script>";
              }
            
    }


    ?>
<br>
<section class = 'Heading'>
<h1>RIDES INFORMATION</h1>

<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search For Ride Names..">
<table class="table table-dark table-striped" id="myTable">

  <thead class="thead-dark">
    <tr>
      <th scope="col">RIDE ID</th>
      <th scope="col">RIDE NAME</th>
      <th scope="col">PARK NAME</th>
      <th scope="col">MAINTENANCE COST</th>
      <th scope="col">AGE LIMIT</th>
    </tr>
  </thead>
  <tbody>
      <?php 
            require_once('dbconnect.php'); 
            $query = "SELECT ride_id, ride_name, park_name, maintenance_cost, age_limit  FROM rides_admin"; 
            
            $result=mysqli_query($conn,$query); 

        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
    ?>
    <tr>
      <td><?php echo $row[0];?></td>
      <td><?php echo $row[1];?></td>
      <td><?php echo $row[2];?></td>
      <td><?php echo $row[3];?></td>
      <td><?php echo $row[4];?></td>
    <?php
            }
        }
            
    ?> 
    </tr>
  </tbody>
</table>
</section>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>


