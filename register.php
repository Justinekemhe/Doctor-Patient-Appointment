
<?php include"header.php";?>
<?php include"bodycontent.php";


if(isset($_POST["submit"]))
{
  //include database connection
  include 'dbconnect.php';

$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$DOB=$_POST["DOB"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$gender=$_POST['gender'];
$password=$_POST["password"];
$cpassword=$_POST["cmpassword"];

//check for the password and encrypt
if ($password==$cpassword) {
  $password = md5($password);

  //check if user Exist
$sql="SELECT * FROM user WHERE email='".$email."'";
$result=mysqli_query($connection,$sql);
$num=mysqli_num_rows($result);

if ($num!=0) {
    echo "<script> alert('User already exist');
    window.location.href='register.php';</script>";
}

else{


// insert into multiple tables
$query="INSERT into user (first_name,last_name,email,username,password,role) VALUES ('$fname','$lname','$email','$email','$password','patient')";

$query_run=mysqli_query($connection,$query);
$query1="INSERT INTO `patient` (`patient_id`, `first_name`, `middle_name`, `last_name`, `DOB`, `phone_number`, `email`, `gender`) VALUES (NULL, '$fname','$mname', '$lname','$DOB','$phone_number', '$email','$gender')";
$query_run1=mysqli_query($connection,$query1);
if ($query_run1!=NULL AND $query_run!=NULL) {

                         echo '<script type="text/javascript"> alert("Registered") </script>';
                         ?>
                         <script type="text/javascript">
                           window.location='index.php';
                         </script>
                         <?php

            
                
                    }
                    else{
            echo '<script type="text/javascript"> alert("Your Not Registered please try again") </script>';
          }
                    

}
}
else
 echo '<script type="text/javascript"> alert("Password Not Match") </script>';

}

 ?>
   <div class="row center-align">
   <div class="col offset-s2 s8 offset-s2">
    <div class="card-panel hoverable">
    	<div class="section">
    		<h5 class="center">Registration Form</h5>
    	</div>
      <form method="POST" action="register.php">
    	<div class="row">
	        <div class="input-field col s12 l6">
	          <input id="first_name" type="text" class="validate" name="fname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
	          <label for="first_name">First Name</label>
	        </div>
          <div class="input-field col s12 l6">
            <input id="first_name" type="text" class="validate" name="mname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
            <label for="middle_name">Middle Name</label>
          </div>
        </div>
          <div class="row">
	        <div class="input-field col s12 l6">
	          <input id="last_name" type="text" class="validate" name="lname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
	          <label for="last_name">Last Name</label>
	        </div>
          <div class="input-field col s12 l6">
            <input id="DOB" type="date" class="validate" name="DOB" required>
            <label for="DOB">Date of birth</label>
          </div>
        </div>
        <div class="row">
        	<div class="input-field col s12 l6">
	          <input id="phone_number" type="text" class="validate" name="phone_number" pattern="[0-9]{10}" title="use numbers Only" maxlength="10">
	          <label for="phone_number">Phone Number</label>
	        </div>
	        <div class="input-field col s12 l6">
	          <input id="email" type="email" class="validate" name="email" required>
	          <label for="email">E-Mail</label>
             <span class="error" aria-live="polite"></span>
	        </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
	          <input id="password" type="password" class="validate" name="password" pattern=".{6,}" title="Six or More Characters" required>
	          <label for="password">Password</label>
	        </div>
	        <div class="input-field col s12 l6">
              <input id="password" type="password" class="validate" name="cmpassword" required>
              <label for="password">Confirm Password</label>
             </div>
        </div>
        <div class="row">
          <div class="input-field col s12 l6">
    <select name="gender" required pattern="Male|Female">
      <option value="" disabled selected>Choose Your Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label>Gender </label>
  </div>
         <div class="row">
	        <div class="input-field col s12 l6">
              <button class="btn teal darken-4" type="submit" name="submit">Register</button>
	        </div>
	    </div>
      </form>
    </div>	
   </div>
   </div>

<?php include"footer.php";?>