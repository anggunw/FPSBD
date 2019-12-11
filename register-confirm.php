<?php
  $connection = mysqli_connect("localhost", "root", "", "bonvoyage");

  $email = $_POST['email'];
  $name = $_POST['name_acc'];
  $nationality = $_POST['nationality'];
  $destination = $_POST['destination'];
  $pickup_time = $_POST['pickup_time'];
  $inn_location = $_POST['inn_location'];
  $number_of_tourists = $_POST['number_of_tourists'];
  $number_of_cars = $_POST['number_of_cars'];
  $payment_method = $_POST['payment_method'];
  $package = $_POST['package'];
  $chosen_package = $destination . $package;

  $query = mysqli_query($connection, "INSERT INTO personal_identity VALUES('$email','$name','$nationality')");
  $query = mysqli_query($connection, "INSERT INTO booking_details(destination, pickup_time, inn_location, number_of_tourists, number_of_cars, email_fk, payment_id_fk, package_id_fk) VALUES('$destination', '$pickup_time', '$inn_location',$number_of_tourists, $number_of_cars, '$email', '$payment_method', '$chosen_package')");

  $query = "SELECT book_number, email_fk, name, nationality, destination, pickup_time, inn_location, number_of_tourists, number_of_cars, payment_method, package_name, SUM(booking_details.number_of_cars * package.package_price) AS total FROM booking_details, personal_identity, package, payment WHERE booking_details.book_number = (SELECT MAX(book_number) FROM booking_details) AND booking_details.package_id_fk = package.package_id AND booking_details.email_fk = personal_identity.email AND booking_details.payment_id_fk = payment.payment_id;";
  $result = showResult($query);

function showResult($query){
  $connect = mysqli_connect("localhost", "root", "", "bonvoyage");
  if(mysqli_connect_errno()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
  $show_Result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  return $show_Result;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Status Details</title>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <style>
    table, tr, th, td
    {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <div class="title">
    <h1>Booking Details</h1>
  </div>
    <table>
      <tr>
        <th>Book Number</th>
        <th>Email</th>
        <th>Name</th>
        <th>Nationality</th>
        <th>Destination</th>
        <th>Pick Up Time</th>
        <th>Inn Location</th>
        <th>Number of Tourists</th>
        <th>Number of Cars</th>
        <th>Payment Method</th>
        <th>Package</th>
        <th>Total</th>
      </tr>
      <?php while($row = mysqli_fetch_array($result)):?>
      <tr>
        <td><?php echo $row['book_number'];?></td>
        <td><?php echo $row['email_fk'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['nationality'] === 'a'? 'Others' : 'Indonesian'?></td>
        <td><?php echo $row['destination'] === 'S'? 'Surabaya' : 'Malang'?></td>
        <td><?php echo $row['pickup_time'];?></td>
        <td><?php echo $row['inn_location'];?></td>
        <td><?php echo $row['number_of_tourists'];?></td>
        <td><?php echo $row['number_of_cars'];?></td>
        <td><?php echo $row['payment_method'];?></td>
        <td><?php echo $row['package_name'];?></td>
        <td><?php echo $row['total'];?></td>
      </tr>
    <?php endwhile;?>
    </table>
    <br>Please pay the bills to Bon Voyage according to the payment method you've chosen<br>
    Dont forget to input your booking number to "Book Number" when paying<br>
    Paypal 5064 231 432 654<br>
    Mandiri 0100 430 876 293<br>
    Ovo 0896 7890 3214<br>

  <div class="container-login100-form-btn">
    <button class="login100-form-btn">
      <a href="home.php" class="login100-form-btn">Home</a>
    </button>
  </div>

</body>
</html>