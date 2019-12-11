<?php
$query = "SELECT package_name, COUNT(package_name) AS total_package FROM package, booking_details WHERE booking_details.package_id_fk = package.package_id GROUP BY package_name";
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
	<title>Most Chosen Package</title>
		<link rel="stylesheet" type="text/css" href="css/registration.css">
   		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
     	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
	<div class="title">
		<h1>Most Chosen Package</h1>
	</div>
	<form action="mc-package.php" method="post">
	<table>
			<tr>
				<th>Package</th>
				<th>Total Package</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['package_name'];?></td>
				<td align="center"><?php echo $row['total_package'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>	
	</form>
</body>
</html>
