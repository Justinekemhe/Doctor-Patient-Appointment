<?php session_start();
 include'header2.php';
 include 'connect1.php';
 include'bodycontent.php';

$email=$_SESSION['email'];
$last_name=$_SESSION['last_name'];
$patient_id=$_SESSION['p_id'];


$sql = "SELECT * FROM appointment, feedback  WHERE appointment.appointment_id = feedback.appointment_id and patient_id='$patient_id'";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
       echo "<table>
    <thead>
          <tr bgcolor=ce93d8>
              <th>first_name</th>
              <th>last_name</th>
              <th>Gender</th>
              <th>Marital status</th>
              <th>status</th>
          </tr>
        </thead>";
    // output data of each row
    while($row =mysqli_fetch_array($result)){
      $var = 1;
      $var = $var + 1;
        echo '<tbody><tr><td>'.$row["first_name"].'</td><td>'.$row["last_name"].'</td><td>'.$row["gender"].'</td><td> '.$row["marital_status"].'</td><td>'; ?>
        
    <a class="waves-effect waves-light btn modal-trigger" href="viewapoi.php?var=<?php echo $row['appointment_id']; ?>" onclick="op()">

          <?php echo''.$row["status"].'</a></td></tr></tbody>';
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>

 <div id="modal1" class="modal">
    <div class="modal-content">
      <h6>Reason</h6>

      <?php
      $appointment_id = $_GET['var'];
      echo( $appointment_id);
      $select = "SELECT * FROM feedback  WHERE  appointment_id =' $appointment_id'";
      $pass = mysqli_query($conn,$select);
      $row3 = mysqli_fetch_array($pass);
      ?>
      <p> <?php echo $row3['feedback_details'] ; ?></p>
    </div>
    <div class="modal-footer">
      <a  class="modal-close waves-effect waves-green btn-flat" onclick="clo()">QUIT</a>
    </div>
  </div>










<script type="text/javascript">
function op(){
  document.getElementById("modal1").style.display= "block";
} 

function clo(){
  document.getElementById("modal1").style.display= "none";

}

</script>


<?php
$conn->close();
?>






<?php include'footer.php'?>
