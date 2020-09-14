
<?php
include 'connect1.php';
$department_name=$_POST["department_name"];
$hospital_id=$_POST["hospital_id"];

$query="INSERT into department (department_name,hospital_id) VALUES ('$department_name','$hospital_id')";

if (mysqli_query($conn,$query) === TRUE) {

            echo '<script type="text/javascript"> alert("department registered") </script>';
          }
          else
          {
          echo '<script type="text/javascript"> alert("huna akili") </script>';
          }



 ?>