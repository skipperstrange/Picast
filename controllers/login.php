<?php 
$form  = load_helper('formr/class.formr', true, 'Formr');
$form->required = '*';

if($form->submit()){
    $form->post('username','Username');
    $form->post('password','Password');
    $errors = [];

    if($form->errors){
        foreach($form->errors as $key => $value){
            $errors[$key]['class'] = 'input-error';
        }

        if(IS_AJAX){
            return json_response(["errors"=>$form->errors]);
        }
    } else{
        load_model('Users');
        $UserModel = new Users($__db);
        $user['username'] = $form->post('username');
        $user['password'] = hash_password($form->post('password'));
        $UserModel->setData($user); 

        if($UserModel->login()){
                redirect_to();
        }
        $errors = $UserModel->getErrors();
    }
}


