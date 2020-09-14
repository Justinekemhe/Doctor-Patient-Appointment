<?php session_start();
 include'header2.php';
 include 'dbconnect.php';
 include'bodycontent.php';

$email=$_SESSION['email'];
$last_name=$_SESSION['last_name'];
$patient_id=$_SESSION['p_id'];

if (isset($_GET['var'])) {
 $id = $$_GET['var'];
 $_SESSION['id'] =  $id;
}
      $update="update feedback set feed_status='1' where feed_status='0' and feedback.patient_id='$patient_id'";
      mysqli_query($connection,$update);

$sql = "SELECT * FROM doctor, appointment, feedback, patient  WHERE doctor.doctor_id = appointment.doctor_id AND feedback.appointment_id = appointment.appointment_id AND patient.patient_id = feedback.patient_id and feedback.patient_id='$patient_id'";
$result=mysqli_query($connection,$sql);

if (mysqli_num_rows($result)>0) {
       echo "<table>
    <thead>
          <tr bgcolor=00796b>
              <th class=white-text>first_name</th>
              <th class=white-text>last_name</th>
              <th class=white-text>Date and time</th>
              <th class=white-text>status</th>
              <th class=white-text>Reason</th>
          </tr>
        </thead>";
    // output data of each row
    while($row =mysqli_fetch_array($result)){
      $var = 1;
      $var = $var + 1;
        echo '<tbody><tr><td>'.$row["doctor_first_name"].'</td><td>'.$row["doctor_last_name"].'</td><td>'.$row["cu_date"].'&nbsp&nbsp'. $row['ti_me'].'</td><td> '.$row["status"].'</td><td>'; ?>
        

          <?php echo''.$row["feedback_details"].'</a></td></tr></tbody>';
    }

    echo "</table>";
} else {
    echo '<h6 class="red-text center-align">No feedback Available</h6>';
    echo'
         <img  src="images/sk.jpg" alt="" class="circle responsive-img" height="" width="">';
    }
         
?>




<?php
$connection->close();
?>






<?php include'footer.php'?>
