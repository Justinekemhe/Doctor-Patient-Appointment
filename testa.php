<?php 

      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php

  include 'dbconnect.php';

  if($_SESSION['role']==Null){

    header("location:index.php");
    exit;

  }

  if($_SESSION['role']!='patient'){

    header("location:index.php");
    exit;

  }
   
    
  ?>

<?php 
// include header file
include"header2.php";
 include"bodycontent.php";?>
   <div class="row">
    <h5 class="center">AVAILABLE DOCTOR'S</h5>
     <?php 
     if(isset($_GET['specialist'])) { 
  $specialist_id = $_GET['specialist'];
  //current id for doctor appointment
 
  
  // $_SESSION['hospital_id']=$id;

          $query=mysqli_query($connection, "SELECT d.doctor_id, d.doctor_first_name, d.doctor_last_name, d.description, d.experience,d.image, h.hospital_name, s.specialist_name, t.department_name FROM doctor as d, hospital as h, specialist as s , department as t WHERE d.department_id=t.department_id AND t.hospital_id=h.hospital_id AND d.specialist_id=s.specialist_id AND s.specialist_id='$specialist_id' and h.hospital_id = '". $_SESSION['hod'] ."'");
          while ($data=mysqli_fetch_assoc($query)) {
            $_SESSION['doctor_id']=$data['doctor_id'];


         
        ?>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <?php
        //echo'
        //<img  src="images/'.$data['image'].'" alt="" class="circle responsive-img">';
         ?>
          <center><span class="card-small"><b><?php echo $data['doctor_first_name']."&nbsp&nbsp". $data['doctor_last_name'] ;?></b></span></center>
        </div>
        <div class="card-small">
          <p><?php echo $data['specialist_name']."-".$data['description'];?></p>
        </div>
        <div class="card-action">
          <center><a href="doctor.php?doctor=<?php echo $data['doctor_id']; ?>" class="btn teal darken-4">View More</a></center>
        </div>
      </div>
    </div>
     <?php }} ?>
     <div class="col s12 m4"></div>
  </div>


<?php include"footer.php"?>