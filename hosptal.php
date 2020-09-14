<?php 
      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();
//include database connection
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
    <!-- <h5 class="center black-text text-darken-2"><marquee>AVAILABLE HOSPITAL'S IN OUR SYSTEM AND THEIR DOCTOR'S</marquee></h5> -->
    
    <?php include('search.php');

  
     $email=$_SESSION['email'];

     if(isset($_POST['search_text'])){

 $sql1 = "SELECT * from patient WHERE email='$email'";
$result1 = $connection->query($sql1);
if ($result1){

   while($row = $result1->fetch_assoc()) {
    $_SESSION['first_name1']=$row['first_name'];
    $_SESSION['last_name1']=$row['last_name'];
   $_SESSION['email1']=$row['email'];
    $patient_id=$row['patient_id'];
    $_SESSION['p_id']=$patient_id;
    }
}
 $hospital = $_POST['search_text'];
//search query for the searched text
          $query=mysqli_query($connection, "SELECT * FROM hospital where hospital_name LIKE '%$hospital%' or address LIKE '%$hospital%'");
          while ($data=mysqli_fetch_assoc($query)) {
            $_SESSION['hospital_id']=$data['hospital_id'];
                    ?>

     <!-- column display in 4 by 3 using while loop   -->

    <div class="col s4">
      <div class="card-panel small">
      <h5 class="center"><?php echo $data['hospital_name'] ;?></h5>
        <!-- <h5 class="center"><?php echo $data['specialist_name'] ;?></h5> -->
        <h6 class="center">Location: <?php echo $data['address'] ;?></h6>
        
        <center><a href="speciali.php?hospital=<?php echo $data['hospital_id']; ?>" class="teal darken-4 btn">View More</a></center>
       
        </div>
      </div>
     <?php } ?>
  </div>
    <?php
     }
      else{


// hospital displayed before search
     $sql1 = "SELECT * from patient WHERE email='$email'";
$result1 = $connection->query($sql1);
if ($result1){

   while($row = $result1->fetch_assoc()) {
    $_SESSION['first_name1']=$row['first_name'];
    $_SESSION['last_name1']=$row['last_name'];
   $_SESSION['email1']=$row['email'];
    $patient_id=$row['patient_id'];
    $_SESSION['p_id']=$patient_id;
    }
}

          $query=mysqli_query($connection, "SELECT * FROM hospital");
          while ($data=mysqli_fetch_assoc($query)) {
            $_SESSION['hospital_id']=$data['hospital_id'];
            //$hospital_id=$_SESSION['ho_id'];
          
        ?>
    <div class="col s12 m4">
      <div class="card-panel small">
        <h5 class="center"><?php echo $data['hospital_name'] ;?></h5>
        <h6 class="center">Location: <?php echo $data['address'] ;?></h6>
        
        <center><a href="speciali.php?hospital=<?php echo $data['hospital_id']; ?>" class="btn teal darken-4">View More</a></center>
       
        </div>
      </div>
     <?php }
   }
      ?>
  </div>

<?php include"footer.php"?>