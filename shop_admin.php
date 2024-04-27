<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Shops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
  <style>
        .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }
    body { 
        background-image: url(../myProject/img/bg.jpg)
        
      }
      .row {
        padding-left: 20px;

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
          <a class="nav-link" href="rides_admin.php">Manage Rides</a>
          <a class="nav-link" href="employees.php">Manage Employees</a>
          <a class="nav-link active" aria-current="page" href="shop_admin.php">Manage Shops</a>
	<button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
        </div>
      </div>
    </div>
  </nav>
    </header>
   
    
    <br>
    <br>
    <h2>ADD STALL</h2>
    <br>


    <form  method="POST">
    	<div class="input-group input-group-lg">
         <span class="input-group-text" id="inputGroup-sizing-lg">Shop ID</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="shop_id">
      </div>
      <br>
      <div class="input-group input-group-lg">
         <span class="input-group-text" id="inputGroup-sizing-lg">Rent</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="rent" required>
      </div>
      <br>
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Shop Type</label>
        <select class="form-select" id="inputGroupSelect01" name="shop_type" required>
          <option selected>Choose...</option>
          <option value="foodstall">Food Stall</option>
          <option value="giftshop">Gift Shop</option>
        </select>
      </div>
      <br>
      <div class="input-group input-group-lg">
         <span class="input-group-text" id="inputGroup-sizing-lg">Park Name</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="park_name" required>
      </div>
      <br>
      <div class="input-group input-group-lg">
         <span class="input-group-text" id="inputGroup-sizing-lg">Shop URL</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="shop_url" required>
      </div>

	  	
	  	<button name="add" class="btn btn-primary ">Add Shop</button>

	</form>

  <br>
<br> 
<h1>DELETE STALL</h1>
<br>
<form method= "POST">
  <div class="row mb-3" >
  <label for="inputPassword3" class="col-sm-2 col-form-label"><h4>Shop ID</h4></label>
  <div class="col-sm-10">
    <input type="number" name= "rd_id" class="form-control" id="inputPassword3">
    </div>
  </div>

    <button type="submit" name="del" class="btn btn-danger">Delete Shop</button>
  </form>
  
  <br>




  <?php
    include('dbconnect.php');
    if (isset($_POST['add'])){
              // echo "Purchase Clicked"; 
              // print_r($_POST);     // Array ( [name] => ABRAR MOJAHID RAFI [user_id] => 40 [email] => rafi.cse.bracu@gmail.com [selected_course] => CSE111-42 [payment_option] => mobile_banking [payment_option_number] => [purchase] => Purchase )
              
              $s_id = $_POST['shop_id'];
              $rent = $_POST['rent']; 
              $s_type = $_POST['shop_type']; 
              $p_name = $_POST['park_name']; 
              $shop_url = $_POST['shop_url'];

              
              
              $sql = "INSERT INTO shop_admin (shop_id, rent, shop_type, park_name, shop_url) VALUES ('$s_id', '$rent', '$s_type', '$p_name', '$shop_url')";
              $result = mysqli_query($conn, $sql);
              if($result) {
                echo "<script>alert('SHOP ADDED SUCCESSFULLY')</script>";
              } else {
                echo "<script>alert('there is an error')</script>";
              }}

              if(isset($_POST['del'])){
                $rd_id = $_POST['rd_id'];
                
                $c = mysqli_query($conn, "SELECT * FROM shop_admin where shop_id = $rd_id");
                if(mysqli_num_rows($c) != 0) {
                $q = mysqli_query($conn, "DELETE FROM shop_admin
                WHERE shop_id = $rd_id ");
                
        
                if($q) {
                  echo "<script>alert('data deleted successfully')</script>";
                } else {
                  echo "<script>alert('there is an error')</script>";
                } }else {
                  echo "<script>alert('There is no such shop.')</script>";
                }
            } 
			?>
		


<section class = 'Heading'>
<h1>SHOPS INFORMATION</h1>

<br>

<table class="table table-dark table-striped">

  <thead class="thead-dark">
    <tr>
      <th scope="col">SHOP ID</th>
      <th scope="col">RENT</th>
      <th scope="col">SHOP TYPE</th>
      <th scope="col">PARK NAME</th>
    </tr>
  </thead>
  <tbody>
      <?php 
            require_once('dbconnect.php'); 
            $query = "SELECT shop_id, rent, shop_type, park_name  FROM shop_admin"; 
            
            $result=mysqli_query($conn,$query); 

        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
    ?>
    <tr>
      <td><?php echo $row[0];?></td>
      <td><?php echo $row[1];?></td>
      <td><?php echo $row[2];?></td>
      <td><?php echo $row[3];?></td>
      
    <?php
            }
        }
            
    ?> 
    </tr>
  </tbody>
</table>
</section>



	
	


    </p>
    <div style="margin-top: 500px;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
