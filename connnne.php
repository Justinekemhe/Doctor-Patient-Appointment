<?php 
include 'connect1.php';
$doctor_id=$_POST["doctor_id"];
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$username=$_POST["username"];
$description=$_POST["description"];
$experiance=$_POST["experiance"];
$gender=$_POST["gender"];
$specialist_id=$_POST["specialist_id"];
$department_id=$_POST["department_id"];
$password=$_POST["password"];
$cpassword=$_POST["cmpassword"];
$role=$_POST["role"] == '' ? 'patient' : $_POST['role'];



if ($password==$cpassword) {
	


$query="INSERT into user (first_name,last_name,email,username,password,role) VALUES ('$fname','$lname','$email','$username','$password','$role')";

$query_run=mysqli_query($conn,$query);
if ($query_run) {

     				echo '<script type="text/javascript"> alert("user registerd from huku") </script>';
     			}
     			else
     			{
     				echo '<script type="text/javascript"> alert("huna akili") </script>';
     			}
   $query3= "INSERT INTO doctor (doctor_id,first_name,middle_name,last_name,email,description,experiance,gender,specilist_id,department_id) VALUES ('$doctor_id', '$fname', '$mname', '$lname', '$email', '$description', '$experiance', '$gender', '$specialist_id','$department_id')";

$result3=mysqli_query($conn,$query3);
if (!$result3) {
	echo "user not added";
}
else{
	echo "user added";
}


}
else
	echo "password wrong";



 ?>