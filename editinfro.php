<?php 
      session_start();
    if(!$_SESSION["username"]){
       header("Location:index.php");
    }
 
?>
<?php
  //session_start();

  include 'connect1.php';

  if($_SESSION['role']==Null){

    header("location:index.php");
    exit;

  }

  if($_SESSION['role']!='patient'){

    header("location:index.php");
    exit;

  }
   
    
  ?>
<?php
include ("header2.php");
?>

<div class="row">
   <div class="col offset-s4 s4 offset-s4">
    <div class="card-panel hoverable">
    	<?php include('connect1.php');
				 $email=$_SESSION['email'];


          $query=mysqli_query($conn, "SELECT first_name,last_name,email from patient WHERE email='$email'");
           while ($data=mysqli_fetch_assoc($query)) {
          ?>
    	<div class="section">
    		<H6 class="center-align">My Details</H6>
    	</div>

    	<form method="POST" action="">
    		<div class="row">
    			<div class="input-field col s12">
	           <table>
        <tbody>
          <tr>
            <td><b>First Name:</b></td>
            <td><?php echo $data['first_name']?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Middle Name:</b></td>
            <td><?php ?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Last Name:</b></td>
            <td><?php echo $data['last_name'];?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Date Of Birth:</b></td>
            <td><?php ?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Phone Number:</b></td>
            <td><?php ?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Email:</b></td>
            <td><?php echo $data['email'];?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	<div class="row">
    			<div class="input-field col s12">
    		  <table>
        <tbody>
          <tr>
            <td><b>Gender:</b></td>
            <td><?php ?></td>
           
          </tr>
      </tbody>
  </table>
    		</div>

    	</div>
    	 <?php } ?>

    	<div class="row">
	        <div class="input-field col s12">
             <a href="patientprofile.php">Edit your Information</a>
	        </div>
	    </div>






    	</form>

    	







    	</div>
    </div>
</div>


<?php
  include ("footer.php");
?>