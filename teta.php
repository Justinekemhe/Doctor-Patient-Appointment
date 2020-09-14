<?php
if (!$_SESSION['username']) {
 echo'
<script>
window.location.assign("index.php");
</script>
 ';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <ul id="dropdown2" class="dropdown-content">
  <li><a href="logout.php">Logout</a></li>
  <li class="divider"></li>
  
</ul>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="logout.php">Logout</a></li>
  <li class="divider"></li>
  
</ul>
  <nav class="nav-wraper teal lighten-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="hosptal.php" class="brand-logo">DPA SYSTEM</a>
      <ul class="right hide-on-med-and-down">
       <?php include 'connection.php';
      $id=$_SESSION['p_id'];
      $data=$pdo->query("select * from feedback where feed_status='0' and feedback.patient_id='$id'");
      $count=$data->rowCOunt();


      ?>
      <li ><a href="viewapoi.php" name="view">View Appointment(<?php echo $count?>)</a></li>
      <li><a href="profile.php">My Details</a></li>
      <li><a href="changepass.php">Change Password</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"><?php $user_id=$_SESSION['username']; echo $user_id;?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <?php include 'connection.php';
      $id=$_SESSION['p_id'];
      $data=$pdo->query("select * from feedback where feed_status='0' and feedback.patient_id='$id'");
      $count=$data->rowCOunt();


      ?>
      <li ><a href="viewapoi.php" name="view">View Appointment(<?php echo $count?>)</a></li>
      <li><a href="profile.php">My Details</a></li>
      <li><a href="changepass.php">Change Password</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><?php $user_id=$_SESSION['username']; echo $user_id;?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>