<?php

if(isset($_POST['search'])){
	$valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT book_date, destination, package_id_fk FROM booking_details WHERE email_fk IN (SELECT email FROM personal_identity WHERE nationality = '$valueToSearch')";
	$search_result = filterTable($query);

} else{
	$query = "SELECT book_date, destination, package_id_fk FROM booking_details WHERE email_fk = ''";
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
	<title>Bon Voyage Booking Search</title>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="nationality.php" method="post">
		<input type="radio" name="valueToSearch" value="i">Indonesian
		<input type="radio" name="valueToSearch" value="a">Others<br><br>
		<input type="submit" name="search" value="Search"><br><br>
		<table>
			<tr>
				<th>book made</th>
				<th>destination</th>
				<th>package</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['book_date'];?></td>
				<td><?php 
						echo $row['destination'] === 'S'? 'Surabaya' : 'Malang' ?>
				</td>
				<td><?php echo $row['package_id_fk'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>
	</form>

</body>
</html>