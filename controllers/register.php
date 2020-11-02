<?php 


$form  = load_helper_class('formr/class.formr', true, 'Formr');


$form->required = '*';
if($form->submit()){
   
    $form->post('email','Email','valid_email');
    $form->post('confirmEmail','Confirm Email | Emails do not match','valid_email |matches[email]');
    $form->post('username','Username','min_length[2] | required');
    $form->post('firstName','First Name','min_length[2]');
    $form->post('lastName','Last Name','min_length[2]| required');
    $form->post('password','Password','min_length[6]| required');
    $form->post('confirmPassword','Confirm Passwords| Passwords do not match','min_length[6] | matches[password]');

    if($form->errors){
        $errors = [];
        foreach($form->errors as $key => $value){
            $errors[$key]['class'] = 'input-error';
        }

        if(IS_AJAX){
            return json_response(["errors"=>$form->errors]);
        }
    } else{
        load_model('Users');
        
        $UserModel = new Users($__db);
        $user['firstName'] = sanitizeFormString(proper_nouns($form->post('firstName')));
        $user['lastName'] = sanitizeFormString(proper_nouns($form->post('lastName')));
        $user['email'] = sanitizeFormString(strtolower($form->post('email')));
        $user['password'] = hash_password($form->post('password'));
        $user['username'] = sanitizeFormString($form->post('username'));
        $UserModel->initData($user); 
        $UserModel->save(true);
        if($UserModel->error()){
           print_r($UserModel->getErrors()); 
           //username exists
        }
        else{
            redirect_to('login');
        }
        
        
    }
}




?>
