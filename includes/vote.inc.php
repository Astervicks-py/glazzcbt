<?php 

session_start();
require_once "./classes.php";
$DB = new DB();
$data = $_POST;
$VOTE = new Vote();
$user_id = $_SESSION['id'];
$question_id = $data['question_id'];
$section = $data['selected_option'];
$answer = $data['my_answer'];
$voteOption = $VOTE->insert_vote($user_id,$question_id,$section,$answer);
if($voteOption)
{
    echo "Voted";
}else{
    echo $voteOption;
}
?>