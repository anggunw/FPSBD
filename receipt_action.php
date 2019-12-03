<?php
$link = mysqli_connect("localhost", "root", "", "bonvoyage");


//Check connection
if($link === false)
{
	die("ERROR: Could not connect."
	mysqli_connect_error());
}
//showing Status Details
$sql = "SELECT book_number, email_fk FROM booking_details WHERE book_number = 1";
if($result = mysqli_query($link, $sql))
{
	if(mysqli_num_rows($result) > 0)
	{
		echo "<table>";
			echo "<tr>";
			echo "<th>book_number</th>";
			echo "<th>email_fk</th>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($result)) 
		{
			echo"<tr>";
				echo "<td>" $row[book_number]"</td>";
				echo "<td>" $row[email_fk]"</td>";
			echo"</tr>";
		}	
		echo "</table>";
		else
		{
			echo"No records matching";
		}
	}
	else
	{
		echo "ERROR $sql"
		mysqli_error($link);
	}
}




// $query = mysqli_query($host, "SELECT book_number, book_date FROM booking_details WHERE book_number = 1");
// $query = mysqli_query($host, "SELECT email_fk, destination, pickup_time, inn_location, number_of_tourists, number_of_cars, total FROM booking_details WHERE book_number = 1");
// ?>