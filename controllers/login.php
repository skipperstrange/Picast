<?php 

$form  = load_helper_class('formr/class.formr', true, 'Formr');
$form->required = '*';

if($form->submit()){
    $form->post('email','Email');
    $form->post('password','Password');

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
        $user['email'] = $form->post('email');
        $user['password'] = hash_password($form->post('password'));
        $UserModel->initData($user); 

        if($UserModel->login()){
                
        }
    }
}



?>
