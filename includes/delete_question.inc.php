<?php 

    session_start();
    require_once "./classes.php";
    $question_id = $_POST['question_id'];
    $DB = new DB;
    $user_id = $_SESSION['id'];

    $sql = "DELETE FROM `custom_questions` WHERE id = '".$question_id."'";
    // echo $sql;
    // die();
    if($DB->save($sql))
    {
        echo true;
    }else{
        echo false;
    }

?>