<?php 
      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();

 

  if($_SESSION['role']==Null){

    header("location:index.php");
    exit;

  }

  if($_SESSION['role']!='patient'){

    header("location:index.php");
    exit;

  }
   
    
  ?>
<?php include "header2.php";?>
<?php include "bodycontent.php";?>

<?php
// including the database connection file
 include 'dbconnect.php';

if(isset($_POST['update']))
{ 
  // $patient_id=$_SESSION['p_id'];

  $patient_id = mysqli_real_escape_string($connection, $_POST['patient_id']);
  
  $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
  $middle_name = mysqli_real_escape_string($connection, $_POST['middle_name']);
  $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
  $DOB = mysqli_real_escape_string($connection, $_POST['DOB']);
  $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
  $email = mysqli_real_escape_string($connection, $_POST['email']); 
  $gender = mysqli_real_escape_string($connection, $_POST['gender']);
  
  // checking empty fields
  if(empty($first_name) || empty($middle_name) || empty($last_name) || empty($DOB) || empty($phone_number) ||  empty($email) || empty($gender)) {  
      
    if(empty($first_name)) {
      echo "<font color='red'>First Name field is empty.</font><br/>";
    }
    
    if(empty($middle_name)) {
      echo "<font color='red'>middle name field is empty.</font><br/>";
    }
    
    if(empty($last_name)) {
      echo "<font color='red'>last name field is empty.</font><br/>";
    } 
    if(empty($DOB)) {
      echo "<font color='red'>Date of Birth field is empty.</font><br/>";
    }  
    if(empty($phone_number)) {
      echo "<font color='red'>phone number field is empty.</font><br/>";
  } 
  if(empty($email)) {
      echo "<font color='red'>Email field is empty.</font><br/>";
    }
    if(empty($gender)) {
      echo "<font color='red'>gender field is empty.</font><br/>";
    }
  }else {  
    //updating the table
    $result = mysqli_query($connection, "UPDATE patient SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name', DOB='$DOB',phone_number='$phone_number',email='$email',gender='$gender' WHERE patient_id=$patient_id");
    
    //redirectig to the display page. In our case, it is index.php
    header("Location: profile.php");
  }
}
?>
<?php
//getting id from url
$patient_id = $_GET['patient_id'];
//echo $patient_id;


//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM patient WHERE patient_id='$patient_id'");

while($data = mysqli_fetch_assoc($result))
{
  $first_name = $data['first_name'];
  $middle_name = $data['middle_name'];
  $last_name = $data['last_name'];
  $DOB = $data['DOB'];
  $phone_number = $data['phone_number'];
  $email = $data['email'];
  $gender = $data['gender'];
?>

<div class="row">
   <div class="col offset-s3 s6 offset-s3">
    <div class="card-panel hoverable">
    	<div class="section">
    		<H6 class="center-align">Edit Your Details</H6>
    	</div>

    	<form method="POST" action="patientprofile.php">
    		<div class="row">
    			<div class="input-field col s12">
    		<input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $data['first_name'];?>">
              <label for="first_name">First Name</label>
            
	         
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input id="middle_name" type="text" class="validate" name="middle_name" value="<?php echo $data['middle_name'];?>">
	          <label for="middle_name">Midlle Name</label>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $data['last_name'];?>">
	          <label for="last_name">Last Name</label>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input id="date" type="date" class="validate" name="DOB" value="<?php echo $data['DOB'];?>">
	          <label for="date">Date of Birth</label>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input id="phone_number" type="text" class="validate" name="phone_number" value="<?php echo $data['phone_number'];?>">
	          <label for="phone_number">Phone Number</label>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input id="email" type="email" class="validate" name="email" value="<?php echo $data['email'];?>">
	          <label for="email">Email</label>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		<input type="text" name="gender" value="<?php echo $data['gender'];?>">
      
    <label>Gender </label>
    		</div>

    	</div>

    	<div class="row">
	        <div class="input-field col s6">
              <button class="btn teal darken-4" type="submit" name="update" value="update">Update Your Profile</button>
	        </div>
	    </div>


    	</form>


    	</div>
    </div>
  <?php }?>
</div>

<?php include "footer.php";?>
