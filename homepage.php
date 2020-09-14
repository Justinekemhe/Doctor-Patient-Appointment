<?php 
      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();

  include 'connect1.php';

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
    <h5 class="center">TOP DOCTORS</h5>
     <?php include('connect1.php');
     $email=$_SESSION['email'];
     $sql1 = "SELECT * from patient WHERE email='$email'";
$result1 = $conn->query($sql1);
if ($result1){

   while($row = $result1->fetch_assoc()) {
    $_SESSION['first_name1']=$row['first_name'];
    $_SESSION['last_name1']=$row['last_name'];
   $_SESSION['email1']=$row['email'];
    $patient_id=$row['patient_id'];
    $_SESSION['p_id']=$patient_id;
    }
}

          $query=mysqli_query($conn, "SELECT d.doctor_id, d.first_name, d.last_name, d.description, d.experience,d.image, h.hospital_name, s.specialist_name, t.department_name FROM doctor as d, hospital as h, specialist as s , department as t WHERE d.department_id=t.department_id AND t.hospital_id=h.hospital_id AND d.specialist_id=s.specialist_id ");
          while ($data=mysqli_fetch_assoc($query)) {
            $_SESSION['doctor_id']=$data['doctor_id'];
          
        ?>
    <div class="col s4">
      <div class="card-panel small">
          <?php
          echo'
         <img src="images/'.$data['image'].'" alt="" class="circle responsive-img">';
         ?>
        <h5 class="center"><?php echo $data['first_name']."&nbsp&nbsp". $data['last_name'] ;?></h5>
            <p class="light"> <?php echo $data['specialist_name']."-".$data['description'];?></p>
             <center><a href="doctor.php?doctor=<?php echo $data['doctor_id']; ?>" class="blue btn">View More</a></center>
        </div>
      </div>
     <?php } ?>
  </div>


<?php include"footer.php"?>