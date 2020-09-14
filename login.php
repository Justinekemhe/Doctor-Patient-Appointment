     
      <div class="row">
        <div class="col s12 l4"></div>
        <div class="col s12 l4">
          <div class="card-panel hoverable">
            <div class="section">
              <h5 class="center">Login Here</h5>
            </div>
            <form method="POST" action="user_login.php">
              <?php if (count($error)>0) {
                foreach ($error as $value) {
                  echo $error;
                }
              }  ?>
              <div class="input-field">
                <i class="material-icons prefix">account_box</i>
                <input type="text" id="username" name="username">
                <label for="username" class="active">Username</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">https</i>
                <input type="password" id="password" name="password">
                <label for="password" class="active">Password</label>
              </div>
              <div class="section">
                <a href="#">Forgot Password | </a><a href="register.php">Register Here</a>
              </div>
              <div class="input-field">
                <button class="btn" type="submit" name="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col s12 l4"></div>
      </div>

  <?php include"footer.php";?>