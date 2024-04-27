<?php
   session_start();
   $v_id = $_SESSION['visitor_id'];
?>


<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Course Purchase</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<style>

      body { 
        background-image: url(../myProject/img/confirm.jpg)
      }
			.container{
				max-width: 800px;
				margin:0 auto;
				padding:50px;
				box-shadow: rgba(100222222, 100, 11134, 0.2) 0px 7px 29px 0px;
			}
			.form-group{
				margin-bottom:30px;
			}
      h1 {
        -webkit-text-stroke: 1px black;
      }
		</style>
	</head>
	<body>
		
		<br>
		<div class="container">
		
			<?php
				
				require_once "dbconnect.php"; 
				
				if (isset($_POST['buy'])){
          $r_id = $_POST['selected_ride'];
                
         
          $qty = $_POST['qty'];
          $pdate = date('Y-m-d',strtotime($_POST['pdate']));
					$purchaser_payment_option_number = $_POST['payment_option_number']; 
					$purchaser_payment_option = $_POST['payment_option']; 
					
					$cond = mysqli_query($conn, "select * from rides_admin where ride_id = '$r_id' ");
					
          if(mysqli_num_rows($cond) != 0) {
						if ($purchaser_payment_option == 'cash'){
						$query = mysqli_query($conn, "INSERT INTO ride_tickets_visitors_book(ride_id,  card, cash, bkash, date, quantity, visitor_id) VALUES ('$r_id', 'NO', 'YES','NO','$pdate','$qty', '$v_id')");
					} else if ($purchaser_payment_option == 'bkash'){
						$query = mysqli_query($conn, "INSERT INTO ride_tickets_visitors_book(ride_id, card, cash, bkash, date, quantity, visitor_id) VALUES ('$r_id', 'NO', 'NO', '$purchaser_payment_option_number','$pdate','$qty', '$v_id')");
					} else if ($purchaser_payment_option == 'card'){
						$query = mysqli_query($conn, "INSERT INTO ride_tickets_visitors_book(ride_id,  card, cash, bkash, date, quantity, visitor_id) VALUES ('$r_id', '$purchaser_payment_option_number', 'NO', 'NO','$pdate','$qty', '$v_id')");
					}


          if($query) {
            echo "<script>alert('CONGRATULATION!! TICKET PURCHASE SUCCESSFUL')</script>";
          } else {
            echo "<script>alert('ERROR')</script>";
          }
				} else{
					echo "<script>alert('THERE IS NO RIDE WITH THAT ID')</script>";
				}
				} 
			?>
			
			<form  method="post">
				<div class="form-group">
        <h1 class="display-1"><p style="color:white;"><b>TICKET CONFIRMATION</b><p></h1>
				</div>
				
				<div class="form-group">
					<div class="input-group mb-3">
					  <label class="input-group-text" for="inputGroupSelect01">Choose Your Ride:</label>
					  <select class="form-select" id="inputGroupSelect01" name="selected_ride">
						<option selected>Choose...</option>
						<?php
							$query = "SELECT ride_id, ride_name, park_name  FROM rides_admin"; 
							$row = mysqli_query($conn, $query); 
							while ($r = mysqli_fetch_array($row)){
								$r_id = $r['ride_id']; 
								$r_name = $r['ride_name']; 
								$p_name = $r['park_name'];

								echo "<option value=\"$r_id\">$r_id - $r_name - $p_name</option>";
							}
						?>
					  </select>
					</div>
				</div>

				
				
				
				
			
				
				<div class="form-group">
					<div class="input-group mb-3">
					  <label class="input-group-text" for="inputGroupSelect02">Payment Option</label>
					  <select class="form-select" id="inputGroupSelect02" name="payment_option" type="text">
						<option selected>Choose...</option>
						<option value="cash">Cash</option>
						<option value="bkash">Bkash</option>
						<option value="card">Card </option>
					  </select>
					  <input type="text" placeholder="Bkash/Card:" name="payment_option_number" class="form-control">
					</div>
				</div>
				
				
				
				
				

        <div class="form-group">
					<input type="date" required placeholder="Enter Purchase Date" name="pdate" class="form-control">
				</div>

        <div class="form-group">
					<input type="number" required placeholder="Enter Quantity of Tickets" name="qty" class="form-control">
				</div>

        <button type="submit" name="buy" class="btn btn-success">Buy Ticket</button>
				<button><a href="ticket_visitor.php" style="text-decoration:none;">Back</a></button>
			</form>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	</body>
</html>
