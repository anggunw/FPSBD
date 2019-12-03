<!DOCTYPE html>
<html>
<head>
	<title>Bon Voyage - Reservation Form</title>
</head>
<body>
	<div class="judul">		
		<h1>Bon Voyage Reservation Form</h1>
	</div>

	<h3>Personal Identity</h3>
	<form action="register-aksi.php" method="post" enctype="multipart/form-data">		
		<table>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" required></td>					
			</tr>	
			<tr>
				<td>Name</td>
				<td><input type="text" name="name_acc" required></td>				
			</tr>	
			<tr>
				<td>Nationality</td>
				<td>
					<input type="radio" name="nationality" value="i" required>Indonesian
					<input type="radio" name="nationality" value="a" required>Others
    			</td>				
			</tr>
		</table>

		<h3>Booking Details</h3>
		<table>
			<tr>
				<td>Destination</td>
				<td>
					<input type="radio" name="destination" value="s" required>Surabaya
					<input type="radio" name="destination" value="m" required>Malang
    			</td>	
    		</tr>
            <tr>
            	<td>Pick Up Time</td>
            	<td><input type="datetime-local" name="pickup_time" required></td>
            </tr>
            <tr>
            	<td>Inn Location</td>
            	<td><input type="text" name="inn_location" required></td>
            </tr>
            <tr>
            	<td>Number of Tourists</td>
            	<td><input type="Number" name="number_of_tourists" required></td>
            </tr>
            <tr>
            	<td>Number of Cars</td>
            	<td><input type="Number" name="number_of_cars" required></td>
            </tr>
            <tr>
            	<td>Payment Method</td>
            	<td>
     				<select name="payment_method" required>
      					<option selected hidden value="">Select Payment</option>
      					<option value="PPL">Paypal</option>
     					<option value="MDR">Mandiri</option>
     					<option value="OVO">Ovo</option>
     				</select>
     			</td>
            </tr>
			<tr>
				<td><input type="submit" value="Next"></td>					
			</tr>	
		</table>
	</form>
</body>
</html>