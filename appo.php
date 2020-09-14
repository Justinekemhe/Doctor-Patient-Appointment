 <?php session_start();?>

<?php include"dbconnect.php"?>
<?php
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$date=$_POST["date"];
$time=$_POST["time"];
$phone_number=$_POST["phone_number"];
$occupation=$_POST["occupation"];
$region=$_POST["region"];
$nationality=$_POST["nationality"];
$marital_status=$_POST["marital_status"];
$gender=$_POST["gender"];
$reason=$_POST["reason"];
$doctor_id=$_SESSION["id"];
$patiend_id=$_SESSION["p_id"];


$query="INSERT INTO `appointment` (`appointment_id`, `first_name`, `middle_name`, `last_name`, `date`, `time`, `phone_number`, `occupation`, `region_id`, `country_id`, `marital_status`, `gender`, `reason`, `doctor_id`,`patient_id`) VALUES (NULL, '$first_name', NULL, '$last_name', '$date', '$time', '$phone_number', '$occupation', '$region', '$nationality', '$marital_status', '$gender', '$reason', '$doctor_id','$patiend_id')";

$query_run=mysqli_query($connection,$query);
if ($query_run) {

     				echo '<script type="text/javascript"> alert("Appointment Sent") </script>';
     				?>
                         <script type="text/javascript">
                           window.location='appointment.php';
                         </script>
                         <?php
     				
                
     			}
     			else
     			{
     				echo '<script type="text/javascript"> alert("huna akili") </script>'.mysqli_error($connection);
     			}





?>