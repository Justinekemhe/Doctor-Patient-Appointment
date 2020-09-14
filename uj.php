<?php

//INITIAL VARIABLE FOR NOT NULL VARIABLE AND MET CONDITIONS
  $staff_id2='';
  $fname2='';
  $mname2='';
  $lname2='';
  $phone2='';
  $email2='';
  $staff_idError='';
  $emailError='';
  $phoneError='';
  $fnameError='';
  $mnameError='';
  $lnameError='';

 include'connect.php';
 if (isset($_POST['add'])) {

 //INPUT WITH VALID TYPE OF DATA.
   $gender = $_POST['gender'];
   $dob = $_POST['dob'];
   $dept = $_POST['dept'];
   $role = $_POST['role'];
   $status='0';
   $password = $_POST['lname'];

   //CHECK THE INPUT SLASHES! SPECIAL CHARACTERS
      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

        //VALIDATE INPUTS FROM THE FORM
    // FOR STAFF ID
   $staff_id = test_input($_POST["staff_id"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z0-9]*$/",$staff_id)) {
$staff_idError = "Only letters,space and numbers";
}else{
     $staff_id2="$staff_id";
  }
   
   //FOR FIRST NAME
$fname = test_input($_POST["fname"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
$fnameError = "Only letters and space allowed";
}else{
     $fname2="$fname";
  }

    // FOR MIDDLE NAME
$mname = test_input($_POST["mname"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$mname)) {
$mnameError = "Only letters and space allowed";
}else{
     $mname2="$mname";
  }

    // FOR LAST NAME

$lname = test_input($_POST["lname"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
$lnameError = "Only letters and space allowed";
}else{
     $lname2="$lname";
  }

//FOR EMAIL
       $email=test_input($_POST["email"]);
       //Check only emails
       if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailError = "Invalid email format";
       }else{
        $email2="$email";
       }

 //FOR PHONE NUMBER
   $phone = test_input($_POST["phone"]);
   // check name only contains letters and whitespace
  if(!preg_match("/^[0-9]{10}$/",$phone)) {
      $phoneError = "Invalid phone format";
      }else{
        $phone2="$phone";
      }
                //CHECK IF STAFF ID EXIST
            $query_data="SELECT * FROM staff WHERE staff_id='$staff_id2'";
            $data=mysqli_query($conn,$query_data);

           if (mysqli_num_rows($data)>0){
                echo"<script>alert('PLEASE TRY AGAIN, STAFF ID EXISTS!')</script>";
                ?>
               <script type="text/javascript">
                    window.location="add_staff.php";
                </script>
                <?php
                //header('location:add_staff.php');
              }else{    

                 //CHECK FOR VALID FORMAT ONLY TO BE INSERTED TO A DATABASE
      if ($staff_id2!=NULL && $fname2!=NULL && $mname2!=NULL && $lname2!=NULL && $phone2!=NULL &&  $email2!=NULL) {
                 
    $sql="INSERT INTO staff (staff_id,fname,mname,lname,gender,dob,phone,email,dept_name,role_id) VALUES ('$staff_id2','$fname2','$mname2','$lname2','$gender','$dob','$phone2', '$email2','$dept','$role')";
          $result=mysqli_query($conn, $sql);

                $sql1= "INSERT INTO users(username,password,staff_id,status,dept_name,role_id) VALUES ('$staff_id2','$password','$staff_id2','$status','$dept','$role')";

                $result1=mysqli_query($conn, $sql1);

                 if ($result!=0 && $result1!=0) {
                   echo"<script>alert('STAFF ADDED')</script>";
                             }
                           else{
                        echo"<script>alert('STAFF NOT ADDED! COMPLETELY')</script>";
                       }
                     }#END NULLS CHECKING
                   }#END NUM_ROWS EXECUTION
    }//ed submit

?>
<DOCKTYPE! html>
<html>
<head><title>REGISTER STAFF</title>
<style>
    body{
        background:#FFFAFA;
        font-family:Calibri (Body) ;
      }
      #button{
        width: 140px;
        font-size: 15px;
        cursor: pointer;
      }
  
      #label{
        /*width: 280px;*/
        width: calc(135px + 3.5vw);
        height: 28px;
        border-radius: 4px;
       /* box-shadow:0 0 1px 2px #123456;*/
      }
      #label:hover{
        /*width: 280px;*/
        width: calc(135px + 3.5vw);
        height: 28px;
        border-radius: 4px;
        box-shadow:0 0 1px 2px skyblue;
      }
      table tr th{
        font-weight:none;
        font-size: 20px;
      }
      table tr td b{
        font-size: 20px;
       text-align: center;
      }
      table{
        background-color:#ddd;
        margin-top: 6px;
        border-radius: 2px;
        box-shadow: 2px 2px 2px 3px #333;
      }
      table:hover{
           background-color: #ddd;
        margin-top: 6px;
        border-radius: 2px;
        box-shadow: 2px 2px 2px 3px #333;
      }
      .error{
        color: red;
      }
</style>
</head>
<body>
<form method="POST" action=" <?php echo $_SERVER['PHP_SELF'];?>" >
       <table border="0px" cellpadding="5px" cellspacing="8px" align="center" width="100%">
        <tr><th colspan="4">STAFF REGISTRATION FORM</th></tr>
         <tr><td><b>Staff id</b></td><td><span class="error"><?php echo "$staff_idError"; ?></span> <input type="text" name="staff_id" id="label" required></td>
          <td><b>First name</b></td><td><span class="error"><?php echo "$fnameError"; ?></span><input type="text" name="fname" id="label" required></td>
         </tr>

        <tr>
           <td><b>Middle name</b></td><td> <span class="error"><?php echo "$mnameError"; ?></span><input type="text" name="mname" id="label" required></td>
           <td><b>Last name</b></td><td> <span class="error"><?php echo "$lnameError"; ?></span><input type="text" name="lname" id="label" required></td>
        </tr>

           <tr>
             <td><b>Gender</b></td><td><select name="gender" id="label"><option value="Male">Male</option><option value="Female">Female</option></select></td>
             <td><b>Phone number</b></td><td><span class="error"><?php echo "$phoneError"; ?></span><input type="text" name="phone" id="label" required></td>
           </tr>

        <tr>
          <td><b>Date of birth</b></td><td><input type="date" name="dob" id="label" required></td>
          <td><b>Email</b></td><td><span class="error"><?php $emailError; ?></span><input type="email" name="email" id="label" required></td>
        </tr>
     
        <tr>
          <td><b>Department name</b></td><td><select name="dept" id="label">
            <?php
                    //RETRIEVE DEPARTMENT FROM THE DATABASE
        include'connect.php';
          $query="SELECT * FROM `department` ORDER BY `dept_building` ASC ";
          $result=mysqli_query($conn,$query);
           while ($row=mysqli_fetch_assoc($result)){
           ?>
         <option><?php echo $row['dept_name']; ?></option>
           <?php
         }
   
        ?>
   </select>
          </td>
          <td><b>Role</b></td><td><select name="role" id="label"><option value="2">Receptionist</option><option value="1">Secretary</option><option value="3">Admin</option></select></td>
        </tr>

        <tr><td colspan="4" align="center"> <input type="submit" name="add" value="ADD" id="button">&nbsp;&nbsp;&nbsp;<input type="reset" name="clear" value="CLEAR" id="button"></td>
        </tr>
      </table>
     </form>
</body>
</html>
