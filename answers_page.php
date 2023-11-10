<?php
    include_once "header.php";
    $questions = $_SESSION['question_ids'];
    $my_answers = $_SESSION['my_answers'];
    $question_class = new Question();
    $user = new User();
    $is_premium = $user->user_data($user_id, "is_premium")['is_premium'];
    $is_subjective = $question_class->is_subjective($questions[0]);
    $is_correct = false;
    $keywords = NULL;
    $newAnswers = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
</head>
<style>
    .question-nav-section
    {
        width:80vw;
        height:50px;
        margin: auto;
        position:relative;
        right:0;
        transform:translateX(0%);
        bottom:0;
    }
</style>
<body>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "./sidebar.php" ?>
    <?php include_once "decor.php" ?>
    <div style="margin-top: calc(10vh + 40px)"></div>
    <?php 
    
        for ($i=0; $i < count($questions); $i++): ?>
        
        <?php 
            $q_id = $questions[$i];
            $sql = "SELECT * FROM questions WHERE question_id = '$q_id'";
            $result = $DB->read($sql)[0];
        ?>
            <section class="question" data-questionId="<?php echo $q_id ?>">
                <h3>Question <b><?php echo $i + 1 ?></b>&nbsp;</h3>
                <br>
                <p><?php echo $result['question']?></p>
                <br>
                <?php if(!is_null($result['img']) && !empty($result['img']) && $result['img'] != "" && $result['img'] != " "): ?>
                    <div style="width:100%;height:200px">
                        <img style="width:100%;object-fit:contain;height:100%;border-radius:0" src="<?php echo $result['img'] ?>" />
                    </div
                <?php endif; ?>
                <?php if(!$is_subjective): ?>
                <div class="options">
                    <div <?php 
                        

                         if($result['answer'] == $result['option_A'])
                        {
                            if($my_answers["question_".$i] == "")
                            {
                                echo "style='background:red'";
                            }
                            else if($my_answers["question_".$i] == $result['answer'])
                            {
                                echo "style='background:limegreen'";
                            }else{
                                echo "style='background:limegreen'";
                            }
                        }else if($my_answers['question_'.$i] == $result['option_A'] && $result['answer'] != $result['option_A']){
                             echo "style='background:red'";
                        }
                        
                        ?>
                    >
                        <span>(A)</span> <?php echo $result['option_A']?>
                    </div>
                    <div <?php 
                        
                         
                        if($result['answer'] == $result['option_B'])
                        {
                            if($my_answers["question_".$i] == "")
                            {
                                echo "style='background:red'";
                            }
                            else if($my_answers["question_".$i] == $result['answer'])
                            {
                                echo "style='background:limegreen'";
                            }else{
                                echo "style='background:limegreen'";
                            }
                        }else if($my_answers['question_'.$i] == $result['option_B'] && $result['answer'] != $result['option_B']){
                             echo "style='background:red'";
                        }
                        
                        ?>
                    >
                        <span>(B)</span><?php echo $result['option_B']?>
                    </div>
                    <div <?php 
                       
                         
                        if($result['answer'] == $result['option_C'])
                        {
                            if($my_answers["question_".$i] == "")
                            {
                                echo "style='background:red'";
                            }
                            else if($my_answers["question_".$i] == $result['answer'])
                            {
                                echo "style='background:limegreen'";
                            }else{
                                echo "style='background:limegreen'";
                            }
                        }else if($my_answers['question_'.$i] == $result['option_C'] && $result['answer'] != $result['option_C']){
                             echo "style='background:red'";
                        }
                        
                        ?>
                    >
                        <span>(C)</span> <?php echo $result['option_C']?>
                    </div>
                   <div <?php 
                      
                        if($result['answer'] == $result['option_D'])
                        {
                            
                            if($my_answers["question_".$i] == "")
                            {
                                echo "style='background:red'";
                            }
                            else if($my_answers["question_".$i] == $result['answer'])
                            {
                                echo "style='background:limegreen'";
                            }else{
                                echo "style='background:limegreen'";
                            }
                        }else if($my_answers['question_'.$i] == $result['option_D'] && $result['answer'] != $result['option_D']){
                             echo "style='background:red'";
                        }
                        
                        ?>
                    >
                        <span>(D)</span> <?php echo $result['option_D']?>
                    </div>
                </div>
                <?php else: ?>
                    <?php 
                        if(!is_null($result['key_words']))
                        {
                            $keywords = json_decode($result['key_words'],true);
                            foreach ($keywords as $key) {
                                $newAnswers[] = strtolower($key);
                            }
                            $is_correct = in_array(strtolower($my_answers["question_".$i]),$newAnswers);
                        }
                        
                    ?>

                    <div style="padding:10px;border-radius:5px;background:<?php echo strtolower($my_answers["question_".$i]) == strtolower($result['answer']) || $is_correct == 1 ? "lime;color:#000" : "#ffaeae;color:#fe0404fc" ?>" >Your Answer => <?php echo $my_answers["question_".$i] ?></div>
                        
                    <?php if(!is_null($result['key_words'])):?>
                        <div><?php echo join(" or ", $keywords) . " will accepted" ?></div>
                    <?php else: ?>
                        <div>answer => <?php echo $result['answer'] ?></div>
                    <?php endif; ?>

                <?php endif;?>
               

                <div class="explanation" style="color:#000">
                 
                    <div>
                        <b>Explanation</b>
                    </div>
                    <?php  if($is_premium): ?>
                        <?php echo $result['explanation']?>
                    <?php else:?>
                        <a href="./payment.php">
                            <h4> Get Premium to get access to comprehensive explanation</h4>
                        </a>
                    <?php endif; ?>
                </div>
                
            </section>
    <?php endfor ?>
   

    

    <div class="nav-button">
        <div class="prev"><a href="score.php">Back</a> </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="prev"><a href="index.php">New Test</a> </div>
    </div>

</body>
<script src="./fontawesome-free-6.2.1-web/js/all.js"></script>
<!-- <script src="./script.js"></script> -->
</html>