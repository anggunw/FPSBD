<?php
if(isset($_POST['search'])){
	$valueToSearch1 = $_POST['valueToSearch1'];
	$valueToSearch2 = $_POST['valueToSearch2'];
	$query = "SELECT book_number, email_fk, pickup_time, inn_location, number_of_tourists, number_of_cars, receipt_number_fk, IF(receipt_number_fk IS NULL, 'Please pay the bills', 'Payment success!') AS details, SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details, package WHERE booking_details.package_id_fk = package.package_id AND booking_details.email_fk = '$valueToSearch1' AND booking_details.book_number = '$valueToSearch2' GROUP BY booking_details.book_number";
	$search_result = filterTable($query);
} else{
	$query = "SELECT book_number, email_fk, pickup_time, inn_location, number_of_tourists, number_of_cars, receipt_number_fk, IF(receipt_number_fk IS NULL, 'Please pay the bills', 'Payment success!') AS details, SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details, package WHERE booking_details.package_id_fk = package.package_id AND booking_details.email_fk = '' AND booking_details.book_number = '' GROUP BY booking_details.book_number";
	$search_result = filterTable($query);
}

function filterTable($query){
	$connect = mysqli_connect("localhost", "root", "", "bonvoyage");
	if(mysqli_connect_errno()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	$filter_Result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Status Details</title>
		<link rel="stylesheet" type="text/css" href="css/registration.css">
   		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
     	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="receipt.php" method="post">
	<div class="title">
		<h1>Receipt</h1>
	</div>
		<input type="text" name="valueToSearch1" placeholder="Please input your e-mail"><br>
		<input type="text" name="valueToSearch2" placeholder="Please input your book number"><br>
		<button type="submit" name="search" value="Search">Search</button>
		<table align="center">
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td>Book Number</td>
				<td><?php echo $row['book_number'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $row['email_fk'];?></td>
			</tr>	
			<tr>
				<td>Pick Up Time</td>
				<td><?php echo $row['pickup_time'];?></td>
			</tr>	
			<tr>
				<td>Inn Location</td>
				<td><?php echo $row['inn_location'];?></td>
			</tr>
			<tr>
				<td>Number of Tourists</td>	
				<td><?php echo $row['number_of_tourists'];?></td>
			</tr>
			<tr>
				<td>Number of Cars</td>
				<td><?php echo $row['number_of_cars'];?></td>
			</tr>	
			<tr>
				<td>Total</td>
				<td><?php echo $row['total'];?></td>
				<?php include 'connection.php';
				$total_result = $row['total'];
				$second_query = mysqli_query($host, "UPDATE booking_details SET total = '$total_result' WHERE booking_details.email_fk='$valueToSearch1' AND booking_details.book_number='$valueToSearch2' ") ?>
				
			</tr>
			<tr>
				<td>Details</td>
				<td><?php echo $row['details'];?></td>
			</tr>		

 		<?php endwhile;?>
		</table><br>

	<div class="container-login100-form-btn">
		<button class="login100-form-btn">
			<a href="home.php" class="login100-form-btn">Home</a>
		</button>
	</div>
	</form>
</body>
</html>
