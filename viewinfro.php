		<div class="col m8 s12">
				<?php 
				include 'dbconnect.php';
				$result = mysqli_query($connection, "SELECT * FROM doctor, appointment,patient  WHERE doctor.doctor_id = appointment.doctor_id AND patient.patient_id =appointment.patient_id and appointment.patient_id='$patient_id'");
				?>
				<div class="card-panel hoverable">
    <div class="section">

      <!--   Icon Section   -->
      <table border="1">
        <thead>
          <tr bgcolor="#00796b">
         <td colspan="8" class="white-text">latest appointment <h class="align right">view all</h></td>

         </tr>
          <tr>
              <th>Doctor</th>
              <th>date</th>
              <th>Reason</th>
              <th>Cancel</th>
          </tr>
        </thead>
        <?php 
  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
  while($row = mysqli_fetch_assoc($result)) {     
    echo "<tr>";
    echo "<td>".$row['doctor_first_name'].'&nbsp&nbsp'.$row['doctor_last_name']."</td>";
    echo "<td>".$row['date']."</td>";   
    echo "<td>".$row['reason']."</td>"; 
    echo "<td><a href=\"delete.php?doctor_id=$row[doctor_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Cancel</a></td>";    
  }
  ?>

			</div>
		</div>
	</div>
</div>