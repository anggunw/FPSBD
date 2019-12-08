<?php

if(isset($_POST['search'])){
	$valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT bk.*, pc.* FROM booking_details as bk, package as pc WHERE bk.email_fk = '$valueToSearch' AND bk.package_id_fk = pc.package_id";
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
	<title>Bon Voyage Booking Search</title>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="search.php" method="post">
		<input type="text" name="valueToSearch" placeholder="Search book by email"><br><br>
		<input type="submit" name="search" value="Search"><br><br>
		<table>
			<tr>
				<th>book number</th>
				<th>book made</th>
				<th>pick up time</th>
				<th>package name</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['book_number'];?></td>
				<td><?php echo $row['book_date'];?></td>
				<td><?php echo  $row['pickup_time'];?></td>
				<td><?php echo $row['package_name'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>
	</form>

</body>
</html>