<div class="signInContainer">
      <div class="column">
          <div class="header">
              <img src="./assets/logo.png" class="logo" alt="">
              <h3>Sign Up</h3>
              <span>Its free, Its simple, Its easy</span>
            </div>
          <form action="<?= _link('register') ?>" method="post">

          <div class="form-input">
          <?php
         echo $form->input_text("firstName", '', '', 'firstName', 'placeholder="First Name" class="'.@$errors['firstName']['class'].'"'); // name, label, value, id,
         
         if(check_key_exists(@$form->errors['firstName'])){
          ?>
           <div class="error">
             <?= @$form->errors['firstName']?>
           </div>
          <?php
        } 
        ?>
          </div>


          <div class="form-input">
         <?php 
         echo $form->input_text("lastName", '', '', 'lastName', 'placeholder="Last Name" class="'.@$errors['lastName']['class'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['lastName'])){
          ?>
           <div class="error">
             <?= @$form->errors['lastName']?>
           </div>
          <?php
        } 
        ?>
          </div>


          <div class="form-input">
         <?php 
         echo $form->input_text("username", '', '', 'username', 'placeholder="Username" class="'.@$errors['username']['class'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['username'])){
          ?>
           <div class="error">
             <?= @$form->errors['username']?>
           </div>
          <?php
        } 
        ?>
          </div>

          
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
         echo $form->input_email("confirmEmail", '', '', 'confirmEmail', 'placeholder="Confirm Email" class="'.@$errors['confirmEmail']['class'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['confirmEmail'])){
          ?>
           <div class="error">
             <?= @$form->errors['confirmEmail']?>
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
        <div class="form-input">
        <?php 
         echo $form->input_password("confirmPassword", '', '', 'confirmPassword', 'placeholder="Confirm Password" class="'.@$errors['confirmPassword'][' tabIndext'].'"'); // name, label, value, id, 
         
         if(check_key_exists(@$form->errors['confirmPassword'])){
          ?>
           <div class="error">
             <?= @$form->errors['confirmPassword']?>
           </div>
          <?php
        } 
        ?>
        </div>
        
        <?php 
         echo $form->input_submit("signUp", '', 'Sign Up', 'signUp'); // name, label, value, id, 
          ?>
          </form>

          <a href="<?= _link('login') ?>" class="info info-auth">Already have an account? Sign in</a>
      </div>
  </div>