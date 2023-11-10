<?php 
    require_once "./header.php";
    session_start();
    $user_id = $_SESSION['id'];
    if(isset($_GET['course']))
    {
        $course = $_GET['course'];

        if(isset($_GET['subjective']))
        {
            $user = new User();
            if(!$user->user_data($user_id,"is_premium")['is_premium'])
            {
                header('location:./payment.php');
                die();
            }


        }
    }
    else{
        header('location:./index.php');
        die();
    }
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
    <div>
        alert("PLEASE ONCE YOU START THE EXAM DO NOT REFRESH THE PAGE ELSE YOU WILL START THE EXAM AFRESH 🤦‍♂️")
    </script>
</head>
<body>
    <?php if(isset($_GET['subjective'])):?>
        <?php include "./darkcover.php" ?>
        <div class="alert">
            <h2 class="alert-topic">❗❗❗❗❗ Attention ❗❗❗❗</h2>
            <h3 class="alert-subtopic">
                Read this before attempting the questions❗❗❗
            </h3>
            <br>
            <div class="scrollcont">
                
                <p>This exam is not like every other exam. It is subjective which means you will have to write the answers yourself. Since this is not marked by a human there are some criterias you must follow in other to get a question right even if you know the answer. these are the guidelines </p>
                <ol>
                    <li>Wrong spelling will be failed ❌❗</li>
                    <li>Do not start your answers with space nor end it with a space (i remove the spaces from your answers but jxt doi it as a precaution) 💀</li>
                    <li>Do not add unneccesarily spaces in your answers e.g 1 - bromo ethane. This will be failed ❌❗</li>
                    <li>Do not explain your answers. the questions have one line word answer else it will be failed even if you are correct ❌❗</li>
                    <br>
                    <ul>
                        <h3>These are the accepted ✅ format for naming organic compounds 🤗</h3>

                        <li>1,2-dibromoethane ✅</li>
                        <li>pent-2,3-diene ✅ </li>
                        <li>bicyclo[3.2.1]octane ✅ </li>
                        <li>butan-1,3-diol ✅ </li>

                        <br>
                        <h3>These are the declined ❌ format for naming organic compounds 🤗</h3>
                        <li>2-propanol ❌</li>
                        <li>2,3-pentene ❌</li>
                    </ul>
                </ol>
            </div>
            <button onclick="closeAlert()" class="close-btn">Close</button>
        </div>
    <?php endif; ?>

    <?php  include "./decor.php" ?>
    <nav>
        <h3>Kortana CBT</h3>
        <div class="user">
            <h4><?php  echo  ucfirst($user_data['username']) ?></h4>  
        </div>
    </nav>

    <section class="timer">
        <div style="display:flex; gap:5px;" class="time-display">
            <div class="minute">10</div>
			<span class="seperator">:</span>
			<div class="second">60</div>
        </div>
    </section>

    <form data-subjective="<?php echo isset($_GET['subjective']) ? TRUE : FALSE ?>" style="margin-top: calc(10vh + 40px)" action="#" method="get">
        <?php
            $question = $course . "_questions";
            if(isset($_GET['subjective']) && $_GET['subjective'] == TRUE)
            {
                $sql = "SELECT * FROM questions WHERE course = '$course'  AND is_subjective = 1 ORDER BY RAND() LIMIT 20";
            }else{
                $sql = "SELECT * FROM questions WHERE course = '$course' AND is_subjective = 0 ORDER BY RAND() LIMIT 20";
            }
            
            if($result = $DB->read($sql))
            {
                for ($i=0; $i < count($result); $i++) {
                    if(isset($_GET['subjective']))
                    {
                        include "./single_subjective_question.php";
                    }else{
                        include "single_question.php";
                    }
                    
                }
            }
            
            
        ?>


        <input type="hidden" name="course" value="<?php echo $course ?>">
        <div class="nav-button">
            <button type="submit" class="btn prev">SUBMIT</button>
        </div> 
    </form>
    

</body>
<script src="./fontawesome-free-6.2.1-web/js/all.js"></script>
<script src="./javascript/marker.js"></script>
</html>