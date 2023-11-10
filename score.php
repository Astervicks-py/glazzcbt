<?php

    require_once "./header.php";
    $course = $_SESSION['course'];
    $score = $_SESSION['score'];
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
<body>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "./sidebar.php" ?>
    <?php include_once "decor.php" ?>
    <!-- LeaderBoard -->
    <section style="margin-top:13vh !important" class="leaderboard mT-2">
        <h1 style="font-family:font7;letter-spacing:.2rem">Leaderboard</h1>
        <h1 style="text-transform:uppercase"><?php echo $course?></h1>
        <table>
            <colgroup>
                <col style="color: #fff;background:var(--primary)">
            </colgroup>
            
            <thead style="color:#fff;background:var(--primary)">
                <tr>
                    <th>S/N</th>
                    <th>Username</th>
                    <th>Course</th>
                    <th>Score (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM leaderboard WHERE course = '$course' ORDER BY score DESC LIMIT 15";
                    // echo $sql;
                    // die;
                    $result = $DB->read($sql);
                    if($result): 
                        for ($i=0; $i < count($result); $i++): ?>
                        
                                <tr>
                                    <th><?php echo $i +1 ?></th>
                                    <td><b><?php echo $result[$i]['username'] ?></b></td>
                                    <td><?php  echo $course ?></td>
                                    <td><?php echo $result[$i]['score'] ?></td>
                                </tr>
                        <?php endfor ?>  
                    <?php endif ?>
                    
            </tbody>
        </table>
    </section>

    <!-- Your Score -->
    <section class="your-score">
        <?php 
            // $sql = "SELECT "
        ?>
        <div>You Scored : <span id="score"><?php echo $score ?>%</span></div> 
    </section>

    <?php 
        $check_id = $_SESSION['question_ids'][0];
        $question_class = new Question();
        $result = $question_class->is_subjective($check_id);
    ?>
    <section class="action-btn flex-row">
        <a href="question.php?course=<?php echo $course?><?php echo ($result == TRUE ) ? "&subjective=TRUE" : "" ?>"><button>New Test</button></a>
        <a href="answers_page.php"><button>Check Answers</button></a>
    </section>
    

</body>
</html>