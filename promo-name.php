<?php
	$query = "SELECT book_number, name, destination, package_name, date(pickup_time) FROM booking_details, personal_identity, package WHERE booking_details.email_fk = personal_identity.email AND booking_details.package_id_fk = package.package_id AND (LOWER(personal_identity.name) LIKE 'lisa%' OR LOWER(personal_identity.name) LIKE 'shofi%' OR LOWER(personal_identity.name) LIKE 'anggun%') ORDER BY book_number ASC";
	$result = showRes($query);

function showRes($query){
	$connect = mysqli_connect("localhost", "root", "", "bonvoyage");

	if(mysqli_connect_errno()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	$res = mysqli_query($connect, $query) or die(mysqli_error($connect));
	return $res;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opening Promo</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	This is the list of reservation that got 10% opening promo cashback with the name "Lisa", "Shofi" or "Anggun"<br>
	Please show this page and your identity card on your travel day<br>
	<table>
		<tr>
			<th>Book Number</th>
			<th>Name</th>
			<th>Destination</th>
			<th>Package</th>
			<th>Travel Date</th>
		</tr>
		<?php while($row = mysqli_fetch_array($result)):?>
		<tr>
			<td><?php echo $row['book_number'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['destination'] === 'S' ? 'Surabaya' : 'Malang';?></td>
			<td><?php echo $row['package_name'];?></td>
			<td><?php echo $row['date(pickup_time)'];?></td>
		</tr>
	<?php endwhile;?>
	</table>
</head>
<div class="container-login100-form-btn">
    <button class="login100-form-btn">
      <a href="home.php" class="login100-form-btn">Home</a>
    </button>
</div>
</body>
</html>