<?php
if(isset($_POST['search'])){
	$valueToSearch1 = $_POST['valueToSearch1'];
	$valueToSearch2 = $_POST['valueToSearch2'];
	$query = "SELECT book_number, email_fk, pickup_time, inn_location, number_of_tourists, number_of_cars, SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details, package WHERE booking_details.package_id_fk = package.package_id AND booking_details.email_fk = '$valueToSearch1' AND booking_details.book_number = '$valueToSearch2' GROUP BY booking_details.book_number";
	$search_result = filterTable($query);
} else{
	$query = "SELECT book_number, email_fk, pickup_time, inn_location, number_of_tourists, number_of_cars, SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details, package WHERE booking_details.package_id_fk = package.package_id AND booking_details.email_fk = '' AND booking_details.book_number = '' GROUP BY booking_details.book_number";
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
	<title>Status Details</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<div class="title">
		<h1>Receipt</h1>
	</div>
	<form action="receipt2.php" method="post">
		<input type="text" name="valueToSearch1" placeholder="Please input your e-mail"><br><br>
		<input type="text" name="valueToSearch2" placeholder="Please input your book number"><br><br>
		<input type="submit" name="search" value="Search"><br><br>
		<table>
			<tr>
				<th>Book Number</th>
				<th>Email</th>
				<th>Pick Up Time</th>
				<th>Inn Location</th>
				<th>Number of Tourists</th>
				<th>Number of Cars</th>
				<th>Total</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['book_number'];?></td>
				<td><?php echo $row['email_fk'];?></td>
				<td><?php echo $row['pickup_time'];?></td>
				<td><?php echo $row['inn_location'];?></td>
				<td><?php echo $row['number_of_tourists'];?></td>
				<td><?php echo $row['number_of_cars'];?></td>
				<td><?php echo $row['total'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>
	</form>
<!-- 
	<?php
	include 'connection.php';
		$booking_details = mysqli_query ($host, "SELECT book_number, receipt_number_fk FROM booking_details WHERE receipt_number_fk IS NULL");
		if($booking_details)
		{
			echo'Please pay the bills';
		}
		else{
			echo'Payment success!';
		}
	
	?>	 -->
	<div class="container-login100-form-btn">
		<button class="login100-form-btn">
			<a href="home.php" class="login100-form-btn">Home</a>
		</button>
	</div>

</body>
</html>