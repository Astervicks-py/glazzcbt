<?php 
    require_once "classes.php";
    session_start();
    $user_id = $_SESSION['id'];
    $question_id = $_POST['question_id'];
    $comm = $_POST['comment'];
    $DB = new DB();
    $comment = new Comment();
    if($comment->insert_comment($user_id,$question_id,$comm))
    {
        header("location:../custom_questions.php");
        die();
    }else{
        echo "<h1 style='font-size:3rem'>Something went Wrong</h1>";
    }
    

?>