<?php
session_start();
session_destroy();
?>
<?php include"header2.php";?>
<?php include"bodycontent.php";?>
   <div class="card-panel hoverable">
   <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
      	<H5 class="center-align">TOP DOCTORS</H5>
        <div class="col s4">
            <h5 class="center">Dr. Faustine Mokiri</h5>
              <img src="images/jay.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            <p class="light">Allergist, conducts the diagnosis and treatment of allergic conditions. working on it 3 years now. From Pugu Hospital and am looking foward to meet you.</p>
             <center><a class="waves-effect waves-light btn">View More</a></center>
        </div>

        <div class="col s4">
            <h5 class="center">Dr. Jayce Justine</h5>
            <img src="images/jay.jpg" alt="" class="circle responsive-img">
            <p class="light">Anesthesiologist, treats chronic pain syndromes; administers anesthesia and monitors the patient during surgery. <i>From Patrick Hosptal</i> am looking foward to meet you</p>
            <center><a class="waves-effect waves-light btn">View More</a></center>
          </div>

        <div class="col s4">
            <h5 class="center">Dr. Peace Msonde</h5>
            <img src="images/jay.jpg" alt="" class="circle responsive-img">
            <p class="light">Cardiologist - treats heart disease. From Pugu Hospital and am looking foward to meet you.</p>
             <center><a href="doctor.php" class="waves-effect waves-light btn">View More</a></center>
        </div>
      </div>
      <div class="row">
       <div class="col s4">
            <h5 class="center">Dr. Frank Mkenye</h5>
            <img src="images/jay.jpg" alt="" class="circle responsive-img">
            <p class="light">Nurse-Midwifery - manages a woman's health care, especially during pregnancy, delivery, and the postpartum period.</p>
             <center><a class="waves-effect waves-light btn">View More</a></center>
        </div>

        <div class="col s4">
            <h5 class="center">Dr. Mary Nyamuhanga</h5>
            <img src="images/jay.jpg" alt="" class="circle responsive-img">
            <p class="light">Pathologist - diagnoses and treats the study of the changes in body tissues and organs which cause or are caused by disease.</p>
            <center><a class="waves-effect waves-light btn">View More</a></center>
          </div>
          <?php include('connect1.php');


          $query=mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id='88' ");
          $data=mysqli_fetch_assoc($query);


          ?>



        <div class="col s4">
            <h5 class="center"><?php echo $data['first_name']."&nbsp&nbsp". $data['last_name'] ;?></h5>
            <img src="images/jay.jpg" alt="" class="circle responsive-img">
            <p class="light">Urologist - diagnoses and treats the male and female urinary tract and the male reproductive system</p>
             <center><a href="doctor.php?doctor=<?php echo $data['doctor_id']; ?>" class="waves-effect waves-light btn">View More</a></center>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
           <ul class="pagination center-align">
    <li class="waves-effect"><a href="homepage.php">1</a></li>
    <li class="active colour green"><a href="doctoprofile.php">2</a></li>
  </ul>
        </div>
      </div>

        </div>
  </div>
</div>

<?php include"footer.php"?>