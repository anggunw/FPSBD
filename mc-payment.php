<?php
$query = "SELECT payment_method, COUNT(payment_method) AS total_payment FROM payment, booking_details WHERE booking_details.payment_id_fk = payment.payment_id GROUP BY payment_method ORDER BY COUNT(payment_method) DESC";
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
	<title>Most Chosen Payment Method</title>
		<link rel="stylesheet" type="text/css" href="css/registration.css">
   		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
     	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
	<div class="title">
		<h1>Most Chosen Payment Method</h1>
	</div>
	<form action="mc-payment.php" method="post">
	<table>
			<tr>
				<th>Payment Method</th>
				<th>Total Payment</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['payment_method'];?></td>
				<td><?php echo $row['total_payment'];?></td>
 			</tr>
 		<?php endwhile;?>
		</table>	
	</form>
</body>
</html>