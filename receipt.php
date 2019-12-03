<!DOCTYPE html>
<html>
<head>
	<title>Status Details</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
	<div class="title">
		<h1>Receipt</h1>
	</div>
	<table border = "1">

		<?php
		include 'connection.php';
		$booking_details = mysqli_query($host, "SELECT book_number, email_fk, pickup_time, inn_location, number_of_tourists, number_of_cars, total FROM booking_details WHERE book_number = 2");
			/*WHERE ini nanti jadi condition tergantung input */
		foreach ($booking_details as $row) 
		{
			echo 
			"<tr>
				<td>Book Number</td>
				<td> ".$row['book_number']."</td>
			</tr>
			<tr>
				<td>Email</td>
				<td> ".$row['email_fk']."</td>
			</tr>
			<tr>
				<td>Pick Up Time</td>
				<td> ".$row['pickup_time']."</td>
			</tr>
			<tr>
			<td>Inn Location</td>
			<td> ".$row['inn_location']."</td>
			</tr>
			<tr>
			<td>Number of Tourists</td>
			<td> ".$row['number_of_tourists']."</td>
			</tr>
			<tr>
			<td>Number of Cars</td>
			<td> ".$row['number_of_cars']."</td>
			</tr>";
		}
			$booking_details = mysqli_query ($host, "SELECT SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details INNER JOIN package ON booking_details.package_id_fk = package.package_id WHERE booking_details.book_number = 2 GROUP BY booking_details.book_number");

			foreach ($booking_details as $key) 
			{
				echo
				"<tr><td>Total</td>
				<td>".$key['total']."</td></tr>";
			}	
		?>
	</table>

	<?php
		$booking_details = mysqli_query ($host, "SELECT book_number, receipt_number_fk FROM booking_details ORDER BY (CASE WHEN receipt_number_fk IS NULL)");
		if($booking_details)
		{
			echo'Please pay the bills';
		}
		else{
			echo'Payment success!';
		}
	?>	

	<div class="container-login100-form-btn">
		<button class="login100-form-btn">
			<a href="home.php" class="login100-form-btn">Home</a>
		</button>
	</div>

</body>	
</html>