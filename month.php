<!DOCTYPE html>
<html>
<head>
	<title>Transaction per Month</title>
	<style>
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Month</th>
				<th>Total Transaction</th>
		</tr>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "bonvoyage");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT month(pickup_time), count(book_number) FROM booking_details GROUP BY month(pickup_time) ORDER BY count(book_number) DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				$bulan = $row["month(pickup_time)"];
				if($bulan == 1){
					$bulan = 'January';
				}
				if($bulan == 2){
					$bulan = 'February';
				}
				if($bulan == 3){
					$bulan = 'March';
				}
				if($bulan == 4){
					$bulan = 'April';
				}
				if($bulan == 5){
					$bulan = 'May';
				}
				if($bulan == 6){
					$bulan = 'June';
				}
				if($bulan == 7){
					$bulan = 'July';
				}
				if($bulan == 8){
					$bulan = 'August';
				}
				if($bulan == 9){
					$bulan = 'September';
				}
				if($bulan == 10){
					$bulan = 'October';
				}
				if($bulan == 11){
					$bulan = 'November';
				}
				if($bulan == 12){
					$bulan = 'December';
				}
				echo "<tr>
						<td>". $bulan . "</td>
						<td>" . $row["count(book_number)"] . "</td>
						</tr>";
				}
				echo "</table>";
			} else { echo "0 results"; }
			$conn->close();
		?>
	</table>
</head>
<div class="container-login100-form-btn">
	<button class="login100-form-btn">
      <a href="home.php" class="login100-form-btn">Home</a>
    </button>
</div>
</body>
</html>