<?php 
$servername="localhost";
$username="root";
$password="";
$db="hospital";

//start connection
$connection=mysqli_connect($servername,$username,$password,$db);

//checking connection
if (!$connection) {
	die("connection failed".mysqli_connect_error());
}else


 ?>