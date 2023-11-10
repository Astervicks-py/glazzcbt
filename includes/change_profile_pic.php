<?php
require_once "./classes.php";
session_start();
$user_id = $_SESSION['id'];
$changeBio = new ChangeBio();
$user = new User();
if(!$user->user_data($user_id,"is_premium")['is_premium'])
{
    echo "not premium";
}else{
    if($changeBio->changeProfileImage($_FILES,$user_id))
    {
        echo true;
    }else{
        echo false;
    }
}

   ?>