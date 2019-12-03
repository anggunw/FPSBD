<?php
include 'connection.php';

$email = $_POST['email'];
$name = $_POST['name_acc'];
$nationality = $_POST['nationality'];
$destination = $_POST['destination'];
$arrival_date = $_POST['arrival_date'];
$inn_location = $_POST['inn_location'];
$number_of_tourists = $_POST['number_of_tourists'];
$number_of_cars = $_POST['number_of_cars'];

// insert personal identity
$query = mysqli_query($host,"INSERT INTO personal_identity VALUES('$email','$name','$nationality')");
        if($query){
            echo 'Account saved, ';
        }
        else{
        }
// insert booking details
$query = mysqli_query($host,"INSERT INTO booking_details(destination, arrival_date, inn_location, number_of_tourists, number_of_cars, email_fk) VALUES('$destination', '$arrival_date', '$inn_location',$number_of_tourists, $number_of_cars, '$email')");
        if($query){
          echo 'Book made';
        }
        else{
          echo 'failed';
        }
?>