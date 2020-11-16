<?php

$Usermodel = auto_load_model('Users');

$Usermodel->logout();

redirect_to('index');