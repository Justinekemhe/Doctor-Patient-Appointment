<?php 
include 'connect1.php';

$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$DOB=$_POST["DOB"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$gender=$_POST['gender'];
$password=$_POST["password"];
$cpassword=$_POST["cmpassword"];
$role=$_POST["role"] == '' ? 'patient' : $_POST['role'];


if ($password==$cpassword) {
	$password = md5($password);
	
$sql="SELECT * FROM user WHERE email='".$email."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if ($num!=0) {
     die("there is user with that username");
}

else{



$query="INSERT into user (first_name,last_name,email,username,password,role) VALUES ('$fname','$lname','$email','$email','$password','$role')";

$query_run=mysqli_query($conn,$query);
if ($query_run) {

     				echo '<script type="text/javascript"> alert("user registerd") </script>';
     				
                
     			}
     			else
     			{
     				echo '<script type="text/javascript"> alert("huna akili") </script>';
     			}
$query1="INSERT INTO `patient` (`patient_id`, `first_name`, `middle_name`, `last_name`, `DOB`, `phone_number`, `email`, `gender`) VALUES (NULL, '$fname','$mname', '$lname','$DOB','$phone_number', '$email','$gender')";
$query_run1=mysqli_query($conn,$query1);
if ($query_run1) {

                         echo '<script type="text/javascript"> alert("user registerd") </script>';
                         
                
                    }
                    else
                    {
                         echo '<script type="text/javascript"> alert("huna akili") </script>';
                    }

}
}
else
	echo "password wrong";



 ?>