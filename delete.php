<?php
//including the database connection file
include("dbconnect.php");

//getting id of the data from url
$id = $_GET['doctor_id'];

//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM appointment WHERE doctor_id=$id");

//redirecting to the display page (index.php in our case)
header("Location:views.php");
?>

