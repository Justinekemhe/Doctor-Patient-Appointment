<?php
session_start();
// include header file 
 include"header2.php";
include"bodycontent.php";
?>

<?php   
// include database connection
include('dbconnect.php');
if(isset($_GET['doctor'])){
  $id=$_GET['doctor'];
  //current id for doctor appointment
  $_SESSION['id']=$id;

    $query=mysqli_query($connection, "SELECT d.doctor_id, d.doctor_first_name, d.doctor_last_name, d.description, d.experience, h.hospital_name, s.specialist_name, t.department_name FROM doctor as d, hospital as h, specialist as s , department as t WHERE d.department_id=t.department_id AND t.hospital_id=h.hospital_id AND d.specialist_id=s.specialist_id AND d.doctor_id='$id' ");
          $data=mysqli_fetch_assoc($query);
  }
?>
<!-- Table for displaying doctor
details -->

   <table>
        <tbody>
          <tr>
            <td><b>Doctor Name:</b></td>
            <td><?php echo $data['doctor_first_name']."&nbsp&nbsp". $data['doctor_last_name'];?></td>
           
          </tr>
          <tr>
            <td><b>Hospital Name:</b></td>
            <td><?php echo $data['hospital_name'];?></td>
            
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $data['description'];?></td>
          
          </tr>
          <tr>
            <td><b>Experiance</b></td>
            <td><?php echo $data['experience'];?></td>
          
          </tr>
          <tr>
            <td><b>Deparment Name</b></td>
            <td><?php echo $data['department_name'];?></td>
          
          </tr>

        </tbody>
      </table> 
      <br>
<div class="card-action center">
  <a href="appointment.php?doctor=<?php echo $data['doctor_id']; ?>" class="btn teal darken-4">MAKE APPOINTMENT</a>
   <a href="hosptal.php" class="btn teal darken-4">Back to Hospital</a>
  </div>


<?php include"footer.php"?>