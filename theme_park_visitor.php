<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Theme Parks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
	
  <style>
    body { 
        background-image: url(../myProject/img/trans.png)
      }


        .navbar-expand-lg .navbar-collapse {
    display: flex!important;
    justify-content: space-around;
    flex-basis: auto;
    }

    
/* Shows an outer shadow */
.card:hover{ /* Just for styling */
  cursor: pointer;
  box-shadow: 0 24px 38px 3px rgba(0,0,0,0.14), 0 9px 46px 8px rgba(0,0,0,0.12), 0 11px 15px -7px rgba(0,0,0,0.2);
}

/* Cards titles styling
------------------------------------------ */
.card{ /* Just for styling */
    align-self: flex-end; padding: 0.5rem;
    color: rgba(255,255,255,.90); font-size: 3rem;
    line-height: 1;font-weight: 600; 
    -webkit-text-stroke: 0.9px black;
  }  

/* Styles for:
** - Using IMG tag inside a container
------------------------------------------ */
/* The image container */

/* Sets the image dimensions */
.card__thumbnail > img{ /* Tip: use 1:1 ratio images */
  height: 100%;
  width: 100%
   /* or width when img.width > img.height */ 
}  
/* Styles the title inside the img container */
.card__thumbnail > .card__title{ /* Just for styling */
  position: absolute; left: flex; bottom:flex ; }


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
          <a class="nav-link"  href="ticket_visitor.php">Buy Tickets</a>
          <a class="nav-link active"  aria-current="page" href="theme_park_visitor.php">Theme Parks</a>
          <a class="nav-link" href="rides_visitor.php">Rides</a>
          <a class="nav-link" href="visitor_employees.php">Employees</a>
          <a class="nav-link" href="shop_visitor.php">Shops</a>
          

          <button type="button" class="btn btn-light" style="margin-left: 200px"><a href="login.php" style="text-decoration:none;">Logout</a></button>
        </div>
      </div>
    </div>
  </nav>
<br>
<h1 class="text-center">ALL OUR AMAZING PARKS !!!</h1>
<br>

<?php 
			require_once('dbconnect.php'); 
			$query = "SELECT park_id,location,park_name,image_url FROM theme_parks"; 
			$row = mysqli_query($conn, $query); 
			// Fetching the data from database. 
			while ($r = mysqli_fetch_array($row)){
				echo '<div class="wrapper">
              <div class="row">
               <div class="column"> 
               <div class="card text-bg-dark">

                    <img src="'.$r["image_url"].'" class="card-img">
                    <div class="card-img-overlay">

                    <h1 class="card__title">'.$r["park_name"].'</h1>
                    <h3 class="card-text">This park is located at '.$r["location"].'</h3>
                    <h5 class="card-text"><small>Park ID: '.$r["park_id"].'</small></h5>

                    
                    
                  </div>
                </div>
              </div>
              </div>

              
               
						
						<br>';
			}
	
		?>