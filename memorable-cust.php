<?php
$query = "SELECT name, package_name, destination, total FROM booking_details, personal_identity, package WHERE booking_details.email_fk = personal_identity.email AND booking_details.package_id_fk = package.package_id AND total > (SELECT AVG(total) FROM booking_details) ORDER BY total";
	$search_result = filterTable($query);
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
	<title>Our Memorable Customers</title>
		<link rel="stylesheet" type="text/css" href="css/registration.css">
   		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
     	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
	<div class="title">
		<h1>Our Memorable Customers</h1>
	</div>
	<form action="memorable-cust.php" method="post">
	<table>
			<tr>
				<th>Name</th>
				<th>Package</th>
				<th>Destination</th>
				<th>Total</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['package_name'];?></td>
				<td><?php echo $row['destination'];?></td>
				<td><?php echo $row['total'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>	
	</form>
</body>
</html>