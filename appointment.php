<?php session_start();?>
<?php
include 'dbconnect.php';

$query=$connection->query('select * from countries');
$rowCount=$query->num_rows;
?>
<?php
    //$nation = $_POST['nationality'];

    $query1=$connection->query("select * from regions");
$rowCount1=$query1->num_rows;
    ?>

<?php 
//include header file 
include"header2.php";
include"bodycontent.php";?>



   <div class="row center-align">
   <div class="col offset-s2 s8 offset-s2">
    <div class="card-panel hoverable">
    	<div class="section">
    		<h5 class="center">Appointment Form</h5>
    	</div>
      <form method="POST" action="appo.php">
    	<div class="row">
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">account_circle</i>
	          <input id="first_name" type="text" class="validate" name="first_name" value="<?php echo($_SESSION['first_name'])?>" required>
	          <label for="first_name" class="black-text">First Name</label>
	        </div>
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">account_circle</i>
              <input id="last_name" type="text" class="validate" name="last_name" value="<?php echo($_SESSION['last_name'])?>" required>
              <label for="last_name" class="black-text">Last Name</label>
             </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">date_range</i>
	          <input id="date" type="date" class="validate" name="date" required>
	          <label for="date" class="black-text">Select Date</label>
	        </div>
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">timer</i>
              <input id="time" type="time" class="validate" name="time" required>
              <label for="time" class="black-text">Select Time</label>
             </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">phone</i>
	          <input id="phonenumber" type="text" class="validate" name="phone_number" pattern="[0-9]{10}" title="use numbers Only" required>
	          <label for="phonenumber" class="black-text">Phone Number</label>
	        </div>
	          <div class="input-field col s12 l6">
              <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate" name="email" value="<?php echo($_SESSION['email']);?>" required>
            <label for="email" class="black-text">Email</label>
          </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
	          <select name="nationality" id="country">
              <option >select your country</option>
              
              <?php
              if ($rowCount>0) {
                while ($row=$query->fetch_assoc()) {
                  echo '<option value='.$row['country_id'].'>'.$row['name'].'</option>';
                }
                
              }
              else{
                echo '<option value="">country not found</option>';


              }



              ?>
              </select>
	        </div>
	        <div class="input-field col s12 l6">
              <select name="region" id="region">
              <option>select your region</option>
              <?php
              if ($rowCount1>0) {
                while ($row=$query1->fetch_assoc()) {
                  echo '<option value='.$row['region_id'].'>'.$row['region_name'].'</option>';
                }
                
              }
              else{
                echo '<option value="">regions not found</option>';


              }



              ?>
              </select>
             </div>
        </div>
        <div class="row">
	       <div class="input-field col s12 l6">
          <i class="material-icons prefix">inbox</i>
          <textarea id="textarea1" type="text" class="materialize-textarea" name="reason"></textarea>
          <label for="textarea1" class="black-text">Reason For Appointment</label>
        </div>
	        <div class="input-field col s12 l6">
            <i class="material-icons prefix">work</i>
              <input id="occupation" type="text" class="validate" name="occupation" required>
              <label for="occupation" class="black-text">Occupation</label>
             </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
    <select name="gender">
      <option value="" disabled selected>Choose Your Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label>Gender </label>
  </div>
	        <div class="input-field col s12 l6">
             <select name="marital_status">
      <option value="" disabled selected>Choose Your Marital Status</option>
      <option value="single">Single</option>
      <option value="married">Married</option>
      <option value="separeted">Separeted</option>
      <option value="unknown">Unkown</option>
      <option value="widow">Widow</option>
    </select>
              <label for="maritalstatus" class="black-text">Marital Status</label>
             </div>
        </div>
          <div class="row">
        <div class="input-field col s12">
  <center><button type="submit" class="btn teal darken-4 center-align">Make An appointment</button></center>  
</div>
</div>
      </form>
    </div>	
   </div>
   </div> 
<?php include"footer.php";?>