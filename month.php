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
			$sql = "SELECT month(pickup_time), count(book_number) FROM booking_details group by month(pickup_time) order by count(book_number)";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<tr>
						<td>". $row["month(pickup_time)"]. "</td>
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