<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOW SHOPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
  <style>
        .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }
    body{
      background-image: url(../myProject/img/confirm.jpg);
      backdrop-filter: blur(5px);

    }
    .card{

      background-image: url(../myProject/img/park.jpg);
      height: 20%;
      width: 70%;
      margin-left: 17%;
      background-repeat: no-repeat;
      background-attachment: fixed;
      
      backdrop-filter: blur(5px);

   
    display: flex;
    align-items: center;
    justify-content: center;
     
     
      
      

    }
    .text-center{
      color: rgba(255,255,255,.90); font-size: 4rem;
    line-height: 1;font-weight: 600; 
    -webkit-text-stroke: 0.9px black;

    }
    .card > img{ /* Tip: use 1:1 ratio images */
  height: 100%;
  width: 100%
   /* or width when img.width > img.height */ 
} 
  </style>
  </head>
  <body>
		
		
	<!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_page_visitor.php">THEME PARK MANAGER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav center">
          <a class="nav-link" href="home_page_visitor.php">Home</a>
          <a class="nav-link" href="ticket_visitor.php">Buy Tickets</a>
          <a class="nav-link" href="theme_park_visitor.php">Theme Parks</a>
          
          <a class="nav-link" href="rides_visitor.php">Rides</a>
          <a class="nav-link" href="visitor_employees.php">Employees</a>
          <a class="nav-link active" aria-current="page" href="shop_visitor.php">Shops</a>
          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
        </div>
      </div>
    </div>
  </nav>
<br>
<h1 class="text-center">All Available Shops</h1>
<br>

<?php 
			require_once('dbconnect.php'); 
			$query = "SELECT shop_id,rent, shop_type, park_name,shop_url FROM shop_admin"; 
			$row = mysqli_query($conn, $query); 

			while ($r = mysqli_fetch_array($row)){
				echo '<div class="card">
          <img src="'.$r["shop_url"].'" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Shop Type: '.$r["shop_type"].'</h5>
            <p class="card-text">This shop belongs to '.$r["park_name"].' park. For locating it use the Shop ID below.</p>
            <p class="card-text"><small class="text-body-secondary">Shop ID: '.$r["shop_id"].'</small></p>        
            </div>
        </div>

			
						<br>';
			}
	
		?>
  
