
<?php session_start();?>
<?php include'header2.php'?>
<?php include"bodycontent.php";?>

<?php include'dbconnect.php'?>

<?php
if (isset($_POST['submit'])) {
  $oldpassword=md5($_POST['oldpassword']);
  $newpassword= md5($_POST['newpassword']);
  $repeatpassword=md5($_POST['repeatpassword']);
  
  $user_id=$_SESSION["user_id"];
  $query="SELECT * FROM user where user_id='$user_id'";

  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("the connection not well edited <br>".mysqli_connect_error());
}
else{
  // while ($row=mysqli_fetch_assoc($result)) {
  //   $dbpassword = $row['password'];
  // }
  $row = mysqli_fetch_array($result);
  $dbpassword = $row['password'];
  if ($dbpassword == $oldpassword AND $newpassword  == $repeatpassword) {
    $query1="UPDATE user set password ='$newpassword' WHERE user_id='$user_id'";
    $result1=mysqli_query($connection,$query1);
    echo "<script>alert('password changed')</script>";
  }
  else{
     echo "<script>alert('password not changed')</script>";
  }
}
}
?>

      <div class="row">
        <div class="col s12 l6 offset-l3">
          <div class="card-panel hoverable">
            <div class="section">
              <h5 class="center">Change Your Password</h5>
            </div>
            <form method="POST" action="changepass.php">
              <div class="input-field">
                <input type="password" id="oldpassword" name="oldpassword">
                <label for="oldpassword" class="black-text">Current Password</label>
              </div>
              <div class="input-field">
                <input type="password" id="newpassword" name="newpassword">
                <label for="newpassword" class="black-text">New Password</label>
              </div>
                <div class="input-field">
                <input type="password" id="repeatpassword" name="repeatpassword">
                <label for="repeatpassword" class="black-text">Repeat Password</label>
              </div>
              <div class="section">
              </div>
              <div class="input-field">
                <button class="btn teal darken-4" type="submit" name="submit">Change Your Password</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col s12 l6"></div>
      </div>

  <?php include"footer.php";?>