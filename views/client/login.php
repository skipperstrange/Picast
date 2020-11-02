  <div class="signInContainer">
      <div class="column">
          <div class="header">
              <img src="./assets/logo.png" class="logo" alt="">
              <h3>Sign In</h3>
              <span>to continue to <?= ucfirst(APP) ?></span>
            </div>
          <form action="register.php" method="post">
              <input type="text" required name="Username" id="username" placeholder="Username">
              <input type="text" required name="password" placeholder="Password">
              <button type="submit" name="signUp">Submit</button>
          </form>

          <a href="<?= _link('register')?>" class="info info-auth">Need an account? Sign up here</a>
      </div>
  </div>
