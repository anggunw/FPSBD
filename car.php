<?php

if(isset($_POST['search'])){
	$valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT book_number, destination, package_id_fk, pickup_time, inn_location, number_of_tourists, number_of_cars FROM booking_details WHERE book_number IN (SELECT book_number_fk FROM car_used WHERE car_id_fk = (SELECT car_id FROM car WHERE car_id = '$valueToSearch')) ORDER BY pickup_time ASC";
	$search_result = filterTable($query);
} else{
	$query = "SELECT * FROM booking_details WHERE email_fk = ''";
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
	<title>Bon Voyage Car Search</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="car.php" method="post">
		<input type="text" name="valueToSearch" placeholder="Search reservation by car id"><br><br>
		<input type="submit" name="search" value="search"><br><br>
		<table>
			<tr>
				<th>Book Number</th>
				<th>Destination</th>
				<th>Package ID</th>
				<th>Pick Up Time</th>
				<th>Inn Location</th>
				<th>Number of Tourists</th>
				<th>Number of Cars</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['book_number'];?></td>
				<td><?php 
						echo $row['destination'] === 'S'? 'Surabaya' : 'Malang' ?>
				</td>
				<td><?php echo $row['package_id_fk'];?></td>
				<td><?php echo  $row['pickup_time'];?></td>
				<td><?php echo $row['inn_location'];?></td>
				<td><?php echo $row['number_of_tourists'];?></td>
				<td><?php echo $row['number_of_cars'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>
	</form>

	<div class="container-login100-form-btn">
    	<button class="login100-form-btn">
      		<a href="home.php" class="login100-form-btn">Home</a>
    	</button>
  	</div>

</body>
</html>