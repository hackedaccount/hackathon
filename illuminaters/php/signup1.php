<?php

require_once '../core/init.php';
//var_dump(input::exists());
if(input::exists())
{
    if(token::check(input::get('token')))
    {
        $validate = new validate();

        $validation = $validate->check($_POST, array(
            'email' => array('required' => true),
            'password' => array('required' => true)
        ));
        if($validation->passed())
        {
            $remeber = (input::get('remember') === 'on') ? true : false;
            $user = new user();

            $login = $user->login(input::get('email'), input::get('password'), $remeber);

            if($login)
            {
                // die("login done");
                Redirect::to("home.php");
            }
            else
            {
                echo "username or password is incorrect";
            }
            
        }
        else{
            foreach($validation->errors() as $error)
            {
                echo $error , '</br>';
            }
        }
    }
}

?>