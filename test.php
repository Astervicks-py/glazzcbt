<?php

include_once "header.php";
require_once "./includes/classes.php";
$DB = new DB();

// $questions = [


//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "is_subjective" => NULL,
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => ,
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"t spaces</i>",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️"
//     ],
//     [
//         "course"=>"aeb200",
//         "question"=>"",
//         "answer" => "",
//         "key_words"=>NULL,
//         "explanation"=>"It\'s pretty self Explantory 🤷‍♂️" 
//     ]
    


// ];


// $count = 0;
// foreach ($questions as $q) {
//     if(!is_null($q['key_words']))
//     {
//         $keywords = json_encode($q['key_words']);
//     }else{
//         $keywords = NULL;
//     }
    
//     $sql = "INSERT INTO `questions`(
//         `course`, `question`, `answer`, `explanation`,`is_subjective`,`key_words`) 
//         VALUES (
//             '". $q['course'] ."',
//             '". $q['question'] ."',
//             '". $q['answer'] ."',
//             '". $q['explanation'] ."',
//             TRUE,
//             '". $keywords ."'
//             )";
//     if($DB->save($sql))
//     {
        
//         echo "Entered ". ++$count."<br />";
//     }
// }


// ? Algorithm for determining key points in a subjective question 
// ! PSEUDOCODE
// ? split the words into an array with " <space> "  as the delimiter,
// ? run a loop through the given array and check if the word is in the array of the key points colleted for the database
// ? If atleast one keypoint is in the keypoints array increment score 
// ? else do nothing


// echo rand(1,16);
$sql = "SELECT user_id FROM users";
// echo "<pre >";
// print_r();
// echo "<pre />";

foreach ($DB->read($sql) as $user) {
    $id = $user['user_id'];
    $ran = rand(1,16);
    $path = "profile-".$ran.".jpeg";
    
    $sql ="UPDATE users SET profile_img = '".$path."' WHERE user_id = '$id'";
    if($DB->save($sql))
    {
        echo "Entered";
    }
}