<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Theme Park</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
  <style>
        .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }
    body{
      background-image: url(../myProject/img/tick.jpg)

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
          <a class="nav-link" href="http://localhost/myProject/home_page_admin.php">Home</a>
          <a class="nav-link "  href="ticket_admin.php">Manage Tickets</a>
          <a class="nav-link active" aria-current="page" href="http://localhost/myProject/theme_park_admin.php">Manage Theme Parks</a>
          
          <a class="nav-link" href="rides_admin.php">Manage Rides</a>
          <a class="nav-link" href="employees.php">Manage Employees</a>
          <a class="nav-link" href="shop_admin.php">Manage Shops</a>
          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
        </div>
      </div>
    </div>
  </nav>
  <form  class= 'from_design' method='post'>
            <div> If you want to add new parks in database fillup the form below</div>
            <br>
            Park ID : <input type='int' name='park_id'> <br/>
            <br>
            Location: <input type='text' name='location'> <br/>
            <br>
            Park Name : <input type='text' name='park_name'> <br/>
            <br>
            image url : <input type='link' name='image_url'></br>
            <br/>
            <input name= "add" type='submit' value='Add park' class="btn btn-success" >
        </form>
        <br>
        <form  class='form_design' method='post'>
            <div> If you want to delete parks from database fillup the form below</div>
            <br>
            Park ID : <input type='int' name='park_id'> <br/>
            <br>
            <input name= "del" type='submit' value='Delete park' class='btn btn-danger'>
        </from>
        <br>
        <br>
        <div> Current Theme Parks are listed below</div>
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Park ID</th>
      <th scope="col">Location</th>
      <th scope="col">Park Name</th>
      <th scope="col">image_url</th>

    </tr>
    </thead>
    <tbody>
    <?php
require_once('dbconnect.php');
if(isset($_POST['del'])) {
	$u = $_POST['park_id'];
	$sql = " DELETE FROM theme_parks WHERE park_id=$u ";
	$result = mysqli_query($conn, $sql);
	if($result) {
    echo "<script>alert('data deleted successfully')</script>";
  } else {
    echo "<script>alert('there is an error')</script>";
  }	
}
?>
<?php
require_once('dbconnect.php');
if(isset($_POST['add'])) {
	$u = $_POST['park_id'];
	$p = $_POST['location'];
	$c = $_POST['park_name'];
	$d = $_POST['image_url'];
	$sql = " INSERT INTO theme_parks VALUES( '$u', '$p', '$c','$d' ) ";
	$result = mysqli_query($conn, $sql);
	if($result) {
    echo "<script>alert('Park added successfully')</script>";
  } else {
    echo "<script>alert('there is an error')</script>";
  }
}
?>



    
    
    
    
    <?php
        require_once('dbconnect.php');
        $sql="SELECT * FROM theme_parks";
        $result=mysqli_query($conn,$sql);  
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
    </body>
</html