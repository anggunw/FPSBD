<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bon Voyage - Reservation Form</title>
        <link rel="stylesheet" type="text/css" href="css/registration.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  label + label {
    margin-left: 50px;
}
</style>
</head>
<body>
	<form action="register-aksi.php" method="post" enctype="multipart/form-data">		

		<h1>Bon Voyage Reservation Form</h1>

<fieldset>
	<legend><span class="number">1</span>Personal Identity</legend>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" required></td>					
			</tr>	
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name_acc" required></td>				
			</tr>	
			<tr>
				<td>Nationality:</td>
				<td>
					<input type="radio" name="nationality" value="i" required>Indonesian
					<input type="radio" name="nationality" value="a" required>Others
    			</td>				
			</tr>
</fieldset>
<fieldset>
		<legend><span class="number">2</span>Booking Details</legend>
	
			<tr>
				<td>Destination: </td>
				<td>
					<input type="radio" name="destination" value="s" required>Surabaya
					<input type="radio" name="destination" value="m" required>Malang
    			</td>	
			</tr>
			<br>
			<br>
            <tr>
            	<td>Pick Up Time: </td>
            	<td><input type="datetime-local" name="pickup_time" required></td>
			</tr>
			<br>
			<br>
            <tr>
            	<td>Inn Location: </td>
            	<td><input type="text" name="inn_location" required></td>
            </tr>
            <tr>
            	<td>Number of Tourists: </td>
            	<td><input type="Number" name="number_of_tourists" required></td>
            </tr>
            <tr>
            	<td>Number of Cars: </td>
            	<td><input type="Number" name="number_of_cars" required></td>
            </tr>
            <tr>
            	<td>Payment Method: </td>
            	<td>
     				<select name="payment_method" required>
      					<option selected hidden value="">Select Payment</option>
      					<option value="PPL">Paypal</option>
     					<option value="MDR">Mandiri</option>
						 <option value="OVO">Ovo</option>
						 <br>
     				</select>
     			</td>
			</tr>

</fieldset>
  <br>
<fieldset>
<legend><span class="number">3</span>Package</legend>

<label>
<div class="card border-primary mb-3" style="max-width: 36rem;">
  <div class="card-header">Package 1</div>
  <div class="card-body text-primary">
    <h5 class="card-title">1 Day</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h5 class="card-title">Rp 123</h5>
	<input type="radio" name="package" value = "1" required/>  
	</label>
</div>
</div>
<label>
<div class="card border-primary mb-3" style="max-width: 36rem;">
  <div class="card-header">Package 2</div>
  <div class="card-body text-primary">
    <h5 class="card-title">2 Days</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h5 class="card-title">Rp 200</h5>
	<input type="radio" name="package" value = "2" required/>  
	</label>
</div>
</div>

<label>
<div class="card border-primary mb-3" style="max-width: 36rem;">
  <div class="card-header">Package 3</div>
  <div class="card-body text-primary">
    <h5 class="card-title">3 Days</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h5 class="card-title">Rp 300</h5>
	<input type="radio" name="package" value = "3" required/>  
</label>
</div>
</div>

  </fieldset>
			<button type="submit">Book Now</button>
      
	</form>
</body>
</html>