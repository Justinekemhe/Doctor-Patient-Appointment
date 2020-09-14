<?php session_start();?>
<?php
$error=array();
include 'connect1.php';
if(isset($_POST["submit"]))
{
  $username=stripcslashes($_POST["username"]);
  $password=stripcslashes($_POST["password"]);
  if (empty($username)) {
    array_push($error, "please enter your username");

  if (empty($password)) {
    array_push($error, "password required");
  }
  if (count($error)== 0) {
    $password = md5($password);
  }

  $query="SELECT * FROM user WHERE username='$username' AND password='$password'");
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result)!=0) {
    


  while($row=mysqli_fetch_array($query)) {

    $db_username=$row["username"];
    $db_role=$row["role"]; 
      
    $_SESSION["user_id"]=$row["user_id"];
    $_SESSION["username"]=$db_username;
    $_SESSION["role"]=$db_role;

    if($_SESSION["role"]=='admin'){
      header("Location:admin/adminpage.php");
    }
    else if ($_SESSION["role"]=='patient'){
      header("Location:homepage.php");
    }
    else if ($_SESSION["role"]=='doctor'){
      header("Location:doctor/doctorpage.php");
    }
    
}
}
    else   
   array_push($error, "your not registerd");


?>