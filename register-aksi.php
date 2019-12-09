
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