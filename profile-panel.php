<?php 
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();


  if($_SESSION['role']==Null){

    header("location:index.php");
    exit;

  }

  if($_SESSION['role']!='patient'){

    header("location:index.php");
    exit;

  }
   
    
  ?>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col m4 s12">
			<div class="card-panel">
				 <?php include('dbconnect.php');
				 $patient_id=$_SESSION['p_id'];

          $query=mysqli_query($connection, "SELECT * from patient WHERE patient_id='$patient_id'");
           while ($data=mysqli_fetch_assoc($query)) {
          ?>
                
				<h6 class="center"><b><?php echo $data['first_name']."&nbsp&nbsp". $data['last_name'] ;?></b></h6>
				<div class="collection">
					<a href="patientprofile.php?patient_id=<?php echo $data['patient_id']; ?>" class="collection-item">Edit Inform</a>
					<a href="views.php" class="collection-item">Cancel Appointment</a>
				</div>
			</div>
			</div>
			 <?php } ?>