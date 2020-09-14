<?php 
      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();

//database connection
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
<?php include"header2.php";?>
<?php include"bodycontent.php";?>
   <div class="row">
    <h5 class="center">AVAILABLE SPECIALIST</h5>
     <?php 
     if(isset($_GET['hospital'])){
  $hospital_id = $_GET['hospital'];
  $_SESSION['hod'] = $hospital_id;
  //current id for doctor appointment
 
  

          $query=mysqli_query($connection, "SELECT DISTINCT s.specialist_name,s.specialist_id FROM doctor as d, hospital as h, specialist as s , department as t WHERE d.department_id=t.department_id AND t.hospital_id=h.hospital_id AND d.specialist_id=s.specialist_id AND h.hospital_id='$hospital_id'");
          while ($data=mysqli_fetch_assoc($query)) {
            // $_SESSION['doctor_id']=$data['doctor_id'];


         
        ?>
    <div class="col s12 m4">
      <div class="card">
        <!-- <div class="card-image">
          <?php
         echo'
         <img  src="images/'.$data['image'].'" alt="" class="circle responsive-img" height="" width="">';
         ?>
          <center><span class="card-small"><b><?php echo $data['doctor_first_name']."&nbsp&nbsp". $data['doctor_last_name'] ;?></b></span></center>
        </div> -->
        <div class="card-small">
          <center><?php echo $data['specialist_name'];?></center>
        </div>
        <div class="card-action">
          <center><a href="testa.php?specialist=<?php echo $data['specialist_id']; ?>" class="btn teal darken-4">View More</a></center>
        </div>
      </div>
    </div>
     <?php }} ?>
     <div class="col s12 m4"></div>
  </div>


<?php include"footer.php"?>