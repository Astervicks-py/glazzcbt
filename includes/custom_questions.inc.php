<?php

session_start();
include "./classes.php";
include "./config.php";
$DB = new DB();
$User = new User();
$notify = new Notification();
$follow = new Follow();
$user_id = $_SESSION['id'];



$data = $_GET;
$question = $data['question'];
$answer = $data['answer'];
$course = strtolower($data['course']);
$option_A = $data['option_A'];
$option_B = $data['option_B'];
$option_C = $data['option_C'];
$option_D = $data['option_D'];
$followers = $follow->get_followers($user_id,"followers");

$options = [
    "option_A" => $option_A,
    "option_B" => $option_B,
    "option_C" => $option_C,
    "option_D" => $option_D,
];

$username = $User->user_data($user_id,$section = "username")['username'];
$options = json_encode($options,true);
$isBool = (isset($data['boolOrOptions']) && $data['boolOrOptions'] == "on") ? true : false;


$sql = "INSERT INTO custom_questions (user_id,username,question,provided_options,isBool,answer,course)  VALUES('".$user_id."','".$username."','".$question."','".$options."','".$isBool."','".$answer."','".$course."')";
if($DB->save($sql))
{
    $sql = "SELECT id FROM custom_questions WHERE user_id = '".$user_id."' ORDER BY id DESC LIMIT 1";
    $question_id =$DB->read($sql)[0]['id'];
    // echo $question_id;
    // die();
    if(is_array($followers))
    {
        foreach ($followers as $follower) {
            $notify->insert_notification($follower,$user_id,"custom_question",$question_id);
        }
    }
    header("Location:../custom_questions.php");
    die();
}else{
    echo "Something Went Wrong";
}


// echo "<pre style='font-size:3rem'>";
// print_r($_GET);
// echo $isBool;
// print_r($options);
// echo "<br/>";
// echo $sql;
// echo "</pre>";
?>