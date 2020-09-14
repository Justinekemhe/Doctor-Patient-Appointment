<?php
 include "header.php";
 include "bodycontent.php";
?>
<?php session_start();
unset($_SESSION['username']);?>

<?php
$error=array();

//include database connection
include 'dbconnect.php';
if(isset($_POST["submit"]))
{
  $username=stripcslashes($_POST["username"]);
  $password=stripcslashes($_POST["password"]);
  if (empty($username)) {
    array_push($error, "please enter your username");
}

  if (empty($password)) {
    array_push($error, "password required");
  }

  //check for error counted
  if (count($error)== 0) {
    $password = md5($password);
 

  $query="SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result)!=0) {




  while($row=mysqli_fetch_array($result)) {

    $db_username=$row["username"];
    $db_role=$row["role"]; 
      
    $_SESSION["user_id"]=$row["user_id"];
    $_SESSION["username"]=$db_username;
    $_SESSION["first_name"]=$row["first_name"];
    $_SESSION["last_name"]=$row["last_name"];
    $_SESSION["email"]=$row["email"];
    $_SESSION["role"]=$db_role;
    $_SESSION["p_id"]=$row["patient_id"];

    if($_SESSION["role"]=='admin'){
      header("Location:admin/adminpage.php");
    }
    else if ($_SESSION["role"]=='patient'){
      header("Location:hosptal.php");
    }
    else if ($_SESSION["role"]=='doctor'){
      header("Location:doctor/doctorpage.php");
    }
    
}
}
    else array_push($error, "your not registerd");
}

}
?>

     
      <div class="row">
        <div class="col s12 l6">
          <div class="slider">
    <ul class="slides"> 
      <li>
        <img src="images/65.jpg">
        <div class="caption left-align">
          <h3 class="black-text">Welcome to the system</h3>
          <h5 class="black-text text-lighten-4">Here's To serve You.</h5> 
        </div>
      </li>
      <li>
        <img src="images/planning.jpg">
        <div class="caption left-align">
          <h3 class="blue-text"></h3>
          <h5 class="black-text text-lighten-4"></h5> 
        </div>
      </li>
      <li>
        <img src="images/doctor.jpg">
        <div class="caption left-align">
          <h3 class="blue-text"></h3>
          <h5 class="black-text text-lighten-4"></h5> 
        </div>
      </li>
  </ul>
</div>

        </div>
        <div class="col s12 l6">
            <div class="section">
              <h5 class="center">Login Here</h5>
            </div>
            <form method="POST" action="index.php">
              <?php if (count($error)>0) {
                foreach ($error as $value) {
                  echo '<p class="red-text" >'.$value.'</p>';
                }
              }  ?>
              <div class="input-field">
                <i class="material-icons prefix">account_box</i>
                <input type="email" id="email" name="username">
                <label for="email" class="black-text">Email</label>
              </div>
              <br>
              <div class="input-field">
                <i class="material-icons prefix">https</i>
                <input type="password" id="password" name="password">
                <label for="password" class="black-text">Password</label>
              </div>
              <br>
              <div class="section">
                <a href="register.php">Register Here</a>
              </div>
              <br>
              <div class="input-field">
                <button class="btn center-align teal darken-4" type="submit" name="submit">Login</button>
              </div>
            </form>
          </div>
       

      </div>

  <?php include"footer.php";?>

