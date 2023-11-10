<?php 
    session_start();
    require "./classes.php";
    $DB = new DB();
    $user_id = $_SESSION['id'];
    $friend_id = $_POST['friend_id'];
    $follow = new Follow();
    $followed = $follow->insert_follow($user_id,$friend_id);
    if($followed)
    {
        echo true;
    }else{
        echo false;
    }

?>