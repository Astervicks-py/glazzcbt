<?php 

    require_once "./classes.php";
    session_start();
    $DB = new DB();
    $id = $_SESSION['id'];

    $query = "";
    // var_dump($_POST);
    // die();
    if(isset($_POST['course']) && $_POST['course'] != 'all')
    {
        $query = "WHERE course LIKE '".$_POST['course']."'";
    }
    $sql = "SELECT * FROM custom_questions $query ORDER BY id DESC LIMIT 30";
    $result = $DB->read($sql);
    $data = "";
    
    if(is_array($result))
    {

        foreach ($result as $question) {
            $option = json_decode($question['provided_options']);
            $isBool = $question['isBool'];
            $total = !$isBool ? $question['option_A'] + $question['option_C'] + $question['option_B'] + $question['option_D'] : $question['true_no'] + $question['false_no'];
            $user = new User();
            // ? Check if the user has already voted
            $VOTED = new Vote();
            $voted = $VOTED->has_voted($_SESSION['id'],$question['id']);
            $option_variant = "";


            // ! initalizing the option to unticked
            $wrong_indicator = "<div style='width:15px;height:15px;background:red;border-radius:50%;'></div>";
            $unticked_indicator = "<div style='width:15px;height:15px;border-radius:50%;'></div>";
            $correct_indicator = "<div style='width:15px;height:15px;background:limegreen;border-radius:50%;'></div>";

            $checkbox_A = $unticked_indicator;
            $checkbox_B = $unticked_indicator;
            $checkbox_C = $unticked_indicator;
            $checkbox_D = $unticked_indicator;
            $checkbox_true = $unticked_indicator;
            $checkbox_false = $unticked_indicator;


            $width_A = $total !== 0 ? ($question['option_A'] / $total) * 100 : 0 ;
            $width_B = $total !== 0 ? ($question['option_B'] / $total) * 100 : 0 ;
            $width_C = $total !== 0 ? ($question['option_C'] / $total) * 100 : 0 ;
            $width_D = $total !== 0 ? ($question['option_D'] / $total) * 100 : 0 ;
            $width_true = $total !== 0 ? ($question['true_no'] / $total) * 100 : 0 ;
            $width_false = $total !== 0 ? ($question['false_no'] / $total) * 100 : 0 ;
            $button = "";
            $my_answer = "";
            if($voted){
                $button = "<button style='font-size:1.1rem' onclick='showVotes(event)' class='btn vote-btn' style='cursor:pointer'>Show Votes</button>";

                // ? Getting my answer
                $given_answers = json_decode($question['voted']);
                foreach ($given_answers as $answered) {
                    if($answered->user_id == $id)
                    {
                        $my_answer = $answered->my_answer;
                    }
                }


                // ! THIS IS CHECKING IF MY ANSWER I THE THE CORRECT ONE BY CHECKING IF THI SOPITION IS THE SELECTED ONE AND THE SELECTED OPTION IS THE ANSWER
                // ! IF THE ANSWER WICH I PICKED IS NOT THE ANSWER THEN THE INDICATOR SHOUKDBE RED ELSE LET IT BE LIME GREEN
                
                if($my_answer ==  $option->option_A ){
                    if($question['answer'] != $option->option_A){
                        $checkbox_A =  $wrong_indicator;
                    }else{
                        $checkbox_A =  $correct_indicator;
                    }
                }else if($question['answer'] == $option->option_A)
                {
                    $checkbox_A = $correct_indicator;
                }

                if($my_answer ==  $option->option_B ){
                    if($question['answer'] != $option->option_B){
                        $checkbox_B =  $wrong_indicator;
                    }else{
                        $checkbox_B =  $correct_indicator;
                    }
                }else if($question['answer'] == $option->option_B)
                {
                    $checkbox_B = $correct_indicator;
                }

                if($my_answer ==  $option->option_C ){
                    if($question['answer'] != $option->option_C){
                        $checkbox_C =  $wrong_indicator;
                    }else{
                        $checkbox_C =  $correct_indicator;
                    }
                }else if($question['answer'] == $option->option_C)
                {
                    $checkbox_C = $correct_indicator;
                }

                if($my_answer ==  $option->option_D ){
                    if($question['answer'] != $option->option_D){
                        $checkbox_D =  $wrong_indicator;
                    }else{
                        $checkbox_D =  $correct_indicator;
                    }
                }else if($question['answer'] == $option->option_D)
                {
                    $checkbox_D = $correct_indicator;
                }


                if($my_answer ==  'true' ){
                    if($question['answer'] != "true"){
                        $checkbox_true =  $wrong_indicator;
                    }else{
                        $checkbox_true =  $correct_indicator;
                    }
                }else if($question['answer'] == "true")
                {
                    $checkbox_true = $correct_indicator;
                }

                if($my_answer ==  'false' ){
                    if($question['answer'] != "false"){
                        $checkbox_false =  $wrong_indicator;
                    }else{
                        $checkbox_false =  $correct_indicator;
                    }
                }else if($question['answer'] == "false")
                {
                    $checkbox_false = $correct_indicator;
                }


                // ? CHECK EVERY OPTION
                // ? 1. IF OPTION IS THE CORRECT ANSWER ADD CORRECT_INDICATOR
                // ? 2. IF OPTION IS INCORRECT BUT MY_ANSWER === OPTION ADD INCORRECT_INDICATOR
                // ? 3. IF OPTION IS NEITHER MY_ANSWER NOR THE CORRECGT ANSWER ADD UNTICKED_INDICATOR
            }

           
            $params = "type='radio' style='cursor:pointer' onchange='insertVote(event)' name='pickedAnswer'";
            if(!$voted) {
                $checkbox_A = "<input ".$params." ' data-option='option_A' value='".$option->option_A."'>";
                $checkbox_B = "<input ".$params." ' data-option='option_B' value='".$option->option_B."'>";
                $checkbox_C = "<input ".$params." ' data-option='option_C' value='".$option->option_C."'>";
                $checkbox_D = "<input ".$params." ' data-option='option_D' value='".$option->option_D."'>";
                $checkbox_true = "<input ".$params." ' data-option='true_no' value='true'>";
                $checkbox_false = "<input ".$params." ' data-option='false_no' value='false'>";
            }
            if(!$isBool)
            {
                $option_variant = "
                    <div class='opt'>
                        ".$checkbox_A."
                        <span class='poll' data-width='". $question['option_A']."' style='width:". $width_A. "%'>". round($width_A)."%</span>
                        <p class='option-value'>". $option->option_A."</p>
                    </div>

                    <div class='opt'>
                        ".$checkbox_B."
                        <span class='poll' data-width='". $question['option_B']."' style='width:". $width_B. "%'>". round($width_B)."%</span>
                        <p class='option-value'>". $option->option_B."</p>
                    </div>

                    <div class='opt'>
                        ".$checkbox_C."
                        <span class='poll' data-width='". $question['option_C']."' style='width:". $width_C. "%'>". round($width_C)."%</span>
                        <p class='option-value'>". $option->option_C."</p>
                    </div>

                    <div class='opt'>
                        ".$checkbox_D."
                        <span class='poll' data-width='". $question['option_D']."' style='width:". $width_D. "%'>". round($width_D)."%</span>
                        <p class='option-value'>". $option->option_D."</p>
                    </div>
                
                ";
            }else{
                $option_variant = "
                    <div class='opt'>
                        ".$checkbox_true."
                        <span class='poll' data-width='". $question['true_no']."' style='width:". $width_true. "%'>". round($width_true)."%</span>
                        <p class='option-value'>TRUE</p>
                    </div>

                    <div class='opt'>
                        ".$checkbox_false."
                        <span class='poll' data-width='". $question['false_no']."' style='width:". $width_false. "%'>". round($width_false)."%</span>
                        <p class='option-value'>FALSE</p>
                    </div>
                
                ";
            }
            // ! CHECK IF USER HAS LIKED
            $liked = [];
            $liked_class= "";
            if(!is_null($question['liked']))
            {
                $liked = json_decode($question['liked'],true);
            }

            if(in_array($id,$liked))
            {
                $liked_class = "heart-active";
            }
            $number_that_liked = count($liked);

            $link = $question['user_id'] == $id ? "./user.php" : "friend_profile.php?id=".$question['user_id']."";
            $data .= "
                <section id=".$question['id']." class='question' data-questionId=".$question['id'].">
                    <div class='user-details-cont'>
                        <img src='./images/profile_img/".$user->user_data($question['user_id'],"profile_img")['profile_img']."'>
                        <h4><a style='text-decoration:none;color:#fff;' href='".$link."'>".$question['username']."</a></h4> 
                        <span class='dot'></span>
                        <button>Follow</button>
                    </div>

                    <h4>Course: ".$question['course']."</h4>

                    <p>".$question['question']."</p>


                        
                    <div class='custom-questions-options-cont'>
                        ".$option_variant."
                    </div>

                       ".$button."

                    
                    <span class='content ".$liked_class."' onclick='likeQuestion(event)'>
                        <div class='heart'></div>
                        <span class='like'>Like</span>
                        <span class='num'>".$number_that_liked."</span>
                    </span>
                    
                </section>
            ";
        }
    }else{
        $data = "
            <div>
                NO DATA FOUND
            </div>
        ";
    }

    echo $data;

    
?>