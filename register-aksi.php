
<?php
include 'connection.php';

$email = $_POST['email'];
$name = $_POST['name_acc'];
$nationality = $_POST['nationality'];
$destination = $_POST['destination'];
$pickup_time = $_POST['pickup_time'];
$inn_location = $_POST['inn_location'];
$number_of_tourists = $_POST['number_of_tourists'];
$number_of_cars = $_POST['number_of_cars'];
$payment_method = $_POST['payment_method'];

// insert personal identity
$query = mysqli_query($host,"INSERT INTO personal_identity VALUES('$email','$name','$nationality')");
        if($query){
            echo 'Account saved';
        }
        else{
        }
// insert booking details
$query = mysqli_query($host,"INSERT INTO booking_details(destination, pickup_time, inn_location, number_of_tourists, number_of_cars, email_fk, payment_id_fk) VALUES('$destination', '$pickup_time', '$inn_location',$number_of_tourists, $number_of_cars, '$email', '$payment_method')");
        if($query){
             echo ', book made';
        }
        else{

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bon Voyage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  label + label {
    margin-left: 50px;
}
</style>
</head>
<body> 
<div class= "judul"> 
 <h1>Packages</h1>
 </div>
 <br>
<div class="container">
<form name ="form1" method ="post" action ="book.php">
  <div class="card-deck">
   <td>
   <div class="card" style="width:400px">
   <label> 
    <div class="card-body">
      <h4 class="card-title">Package 1</h4>
      <p class="card-text">Description</p>
      <!-- <input type="radio" name="package" value="1" required> -->
      <!-- <a href="book.php" class="btn btn-primary">See Profile</a> -->
      <input type="radio" name="package" value = "1" required/>
    </div>
    </label>
    </div>
    <div class="card" style="width:400px">
   <label> 
    <div class="card-body">
      <h4 class="card-title">Package 2</h4>
      <p class="card-text">Description</p>
      <!-- <input type="radio"  name="package" value="2" required> -->
      <!-- <a href="book.php" class="btn btn-primary">See Profile</a> -->
      <input type="radio" name="package" value = "2" required/>
    </div>
    </label>
    </div>
    
    <div class="card" style="width:400px">
   <label> 
    <div class="card-body">
      <h4 class="card-title">Package 3</h4>
      <p class="card-text">Description</p>
      <!-- <input type="radio" name="package" value="3" required> -->
      <!-- <a href="" class="btn btn-primary">See Profile</a> -->
      <input type="radio" name="package" value = "3" required/>
    </div>
    </label>
    </div>
    <br>

    </td>
    <!-- <img class="card-img-bottom" src="img_avatar6.png" alt="Card image" style="width:100%"> -->
  </div>
  
    <br>
 
  <Input type = "Submit" style="login100-form-btn" Name = "Submit1" VALUE = "Book Now">
  </div>
</div>
</form>


</body>
</html>