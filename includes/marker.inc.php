<?php
session_start();
include_once "./classes.php";

$DB = new DB();
if(!isset($_SESSION['id']))
{
    header('location:./login_page.php');
    die();
}

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$user_data = $DB->read($sql)[0];
$username= $user_data['username'];
$user_id = $user_data['user_id'];
$score = 0;
$collected_data = $_POST;
$questionNo = 20;

$my_answers = [];
for ($i=0; $i < $questionNo; $i++) { //The 20 signifies the number; of questions to be looped over
    $id = "question_".$i."_id";
    $name = "question_".$i;
    $my_answers["question_".$i] = isset($_POST[$name]) ? $_POST[$name] : "";
    $sql = "SELECT answer FROM questions WHERE question_id = '$collected_data[$id]'";
    
    $answer = $DB->read($sql)[0]["answer"];
    if(!isset($collected_data[$name])){
        $given = "";
    }else{
        $given = $collected_data[$name];
    }
//     echo "<pre>";
//     echo $given;
// echo "<pre/>";
    // COMPARING THE ANSWER LWITH THE ONE ADDED IN THE DATABASE
    if($given == $answer){
        $score++;
    }
}

//Get the answers of the questions given in the Test


$question_ids = [];
for ($i=0; $i < $questionNo; $i++) {  //The 20 signifies the number of questions to be looped over
    $q_id = "question_".$i."_id";
    $question_ids[] = $collected_data[$q_id];
}
// echo "<pre>";
// var_dump($my_answers);
// echo "<pre>";
// die();
// Calculating percentage of the given score

$percentage = ($score / $questionNo) * 100;

//  INPUT THE CALCULATED PERCENTAGE INTO THE DATABSE OF THE COURSE
$spec =  $_POST['course'];
$sql = "INSERT INTO leaderboard (user_id,username,score,course) VALUES('$user_id','$username','$percentage','$spec')";
if($DB->save($sql))
{
    $_SESSION["course"] = $_POST['course'];
    $_SESSION["score"] = floor($percentage);
    $_SESSION['question_ids'] = $question_ids;
    $_SESSION['my_answers'] = $my_answers;
    echo "Saved";
}