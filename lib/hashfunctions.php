<?php

function hash_password($password){
    return  encrypt($password,['sha512',  'md5', 'md4']);
}