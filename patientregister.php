<?php 
include 'connect1.php';

$first_name=$_POST["first_name"];
$middle_name=$_POST["middle_name"];
$last_name=$_POST["last_name"];
$DOB=$_POST["DOB"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$gender=$_POST["gender"];

	

$query="INSERT into patient (first_name,middle_name,last_name,DOB,phone_number,email,gender) VALUES ('$first_name','$middle_name','$last_name','$DOB','$phone_number','$email','$gender')";

$query_run=mysqli_query($conn,$query);
if ($query_run) {

     				echo '<script type="text/javascript"> alert("user registerd") </script>';
     				
                
     			}
     			else
     			{
     				echo '<script type="text/javascript"> alert("huna akili") </script>';
     			}


 ?>