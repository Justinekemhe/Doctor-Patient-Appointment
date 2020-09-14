<?php include"header.php";?>
<?php include"bodycontent.php";

//verify all user input in the form
$fname2='';
$mname2='';
$lname2='';
$phone2='';
$phoneError='';
$fnameError='';
$mnameError='';
$lnameError='';
if(isset($_POST["submit"]))
{
  include 'dbconnect.php';

$email=$_POST["email"];
$DOB=$_POST["DOB"];
$gender=$_POST['gender'];
$password=$_POST["password"];
$cpassword=$_POST["cmpassword"];
// $role=$_POST["role"];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // for first name
  $fname = test_input($_POST["fname"]);
// verify user input for name only
if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
$fnameError = "use letters only";
}else{
     $fname2="$fname";
  }

  //for middle name
  $mname = test_input($_POST["mname"]);
 //verify user input for name only
  if (!preg_match("/^[a-zA-Z]*$/",$mname)) {
  $mnameError = "use letters only";
  }else{
       $mname2="$mname";
    }

//for last name
    $lname = test_input($_POST["lname"]);
 //verify user input for name only
  if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
  $lnameError = "use letters only";
  }else{
       $lname2="$lname";
    }

    //for phone number
    $phone = test_input($_POST["phone_number"]);
   // verify user input for phone number only
  if(!preg_match("/^[0-9]{10}$/",$phone)) {
      $phoneError = "please enter valid phone number";
      }else{
        $phone2="$phone";
      }

if ($password==$cpassword) {
  $password = md5($password);
  
$sql="SELECT * FROM user WHERE email='".$email."'";
$result=mysqli_query($connection,$sql);
$num=mysqli_num_rows($result);

if ($num!=0) {
     die("there is user with that username");
}

else{


if($fname2!=NULL && $mname2!=NULL && $lname2!=NULL && phone2!=NULL){
$query="INSERT into user (first_name,last_name,email,username,password,role) VALUES ('$fname2','$lname2','$email','$email','$password','patient')";

$query_run=mysqli_query($connection,$query);
$query1="INSERT INTO `patient` (`patient_id`, `first_name`, `middle_name`, `last_name`, `DOB`, `phone_number`, `email`, `gender`) VALUES (NULL, '$fname2','$mname2', '$lname2','$DOB','$phone2', '$email','$gender')";
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
      <form method="POST" action="tt.php">
    	<div class="row">
	        <div class="input-field col s12 l6">
          <!-- <span class="error red-text"><?php echo "$fnameError"; ?></span> -->
          <input id="first_name" type="text" class="validate" name="fname" value=" <?php echo $fnameError; ?> " required>
	          <label for="first_name">First Name</label>
	        </div>
          <div class="input-field col s12 l6">
          <span class="error red-text"><?php echo "$mnameError"; ?></span>
          <input id="first_name" type="text" class="validate" name="mname" required>
            <label for="middle_name">Middle Name</label>
          </div>
        </div>
          <div class="row">
	        <div class="input-field col s12 l6">
          <span class="error red-text"><?php echo "$lnameError"; ?></span>
	          <input id="last_name" type="text" class="validate" name="lname" required>
	          <label for="last_name">Last Name</label>
	        </div>
          <div class="input-field col s12 l6">
            <input id="DOB" type="date" class="validate" name="DOB" required>
            <label for="DOB">Date of birth</label>
          </div>
        </div>
        <div class="row">
        	<div class="input-field col s12 l6">
            <span class="error red-text"><?php echo "$phoneError"; ?></span>
	          <input id="phone_number" type="text" class="validate" name="phone_number" maxlength="10" required>
	          <label for="phone_number">phone_number</label>
	        </div>
	        <div class="input-field col s12 l6">
	          <input id="email" type="email" class="validate" name="email" required>
	          <label for="email">E-Mail</label>
             <span class="error" aria-live="polite"></span>
	        </div>
        </div>
        <div class="row">
	        <div class="input-field col s12 l6">
	          <input id="password" type="password" class="validate" name="password" required>
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