<?php 

    require_once "./classes.php";
    session_start();
    $user_id = $_SESSION['id'];
    $DB = new DB();
    $question_id = $_POST['question_id'];
    $Like_question = new Like();
    if($Like_question->insert_like($user_id,$question_id))
    {
        echo "Liked";
    }
    


?>