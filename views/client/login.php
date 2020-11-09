  <div class="signInContainer">

      <div class="column">
          <div class="header">
              <img src="./assets/logo.png" class="logo" alt="">
              <h3>Sign In</h3>
              <span>to continue to <?= ucfirst(APP) ?></span>
            </div>
          <form action="<?= _link('login') ?>"" method="post">
          <div class="form-input">
         <?php 
         echo $form->input_email("email", '', '', 'email', 'placeholder="Email" class="'.@$errors['email']['class'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['email'])){
          ?>
           <div class="error">
             <?= @$form->errors['email']?>
           </div>
          <?php
        } 
        ?>
          </div>

          <div class="form-input">
        <?php 
         echo $form->input_password("password", '', '', 'password', 'placeholder="Password" class="'.@$errors['password']['class'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['password'])){
           ?>
            <div class="error">
              <?= @$form->errors['password']?>
            </div>
           <?php
         } 
         ?>
          </div>
          <?php 
         echo $form->input_submit("login", '', 'Login', 'login'); // name, label, value, id, 
          ?>
          </form>

          <a href="<?= _link('register')?>" class="info info-auth">Need an account? Sign up here</a>
      </div>
  </div>
