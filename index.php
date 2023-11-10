<?php

require_once "./header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <!-- <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>
    <?php include_once "./loader.php" ?>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "decor.php" ?>
    <?php include_once "sidebar.php" ?>
    <?php include_once "./dictionary.php" ?>
    <!-- LeaderBoard -->
    <section style="margin-top: calc(10vh + 30px) !important" class="leaderboard overall-leaderboard">
        <h1 class="title">Overall Leaderboard</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Course</th>
                        <th>date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM leaderboard ORDER BY score DESC LIMIT 15";
                        $result = $DB->read($sql);
                       
                        if ($result):
                            for ($i=0; $i < count($result); $i++) : ?>
                                <tr>
                                    <th><?php echo $i + 1 ?></th>
                                    <td class="username-img" >
                                        <?php
                                            $id = $result[$i]['user_id'];
                                            $sql = "SELECT profile_img FROM users WHERE user_id = '$id'";
                                            $img = $DB->read($sql)[0]['profile_img'];
                                        ?>
                                        <img src="./images/profile_img/<?php echo $img ?>">
                                        <b><?php echo $result[$i]['username']?></b>
                                    </td>
                                    <td><?php echo $result[$i]['course'] ?></td>
                                    <?php $date = explode("-",$result[$i]['date'])?>
                                    <td><?php echo $date[1] . "/" . $date[2]?></td>
                                    <td><?php echo $result[$i]['score']?></td>
                                </tr>
                            <?php endfor ?>
                        <?php endif ?>

                </tbody>
            </table>
        </section>
        
    </section>


    
    

    <section id="courses" class="courses">
        <h1 class="title" style="font-size:2.3rem;">Courses</h1>
        <div class="course-sect" style="height:200px">
            <a href="question.php?course=aeb200&subjective=TRUE">AEB 200</a>
            <a href="question.php?course=ges100">GES 100</a>
            <a href="question.php?course=ges101">GES 101</a>
            <a href="question.php?course=ges102">GES 102</a>
            <a href="question.php?course=ges103">GES 103</a>
            <a onclick="alert('There are no questions on this course yet 😥. but the fact that you want to test your self on Physics when you have GES exams on monday makes me question your sanity. But you do you 😊')" >PHY 101</a>
            <a onclick="alert('There are no questions on this course yet 😥. but the fact that you want to test your self on Chemistry when you have GES exams on monday makes me question your sanity. But you do you 😊')">CHEM 130</a>
            <a onclick="alert('There are no questions on this course yet 😥. but the fact that you want to test your self on Chemistry when you have GES exams on monday makes me question your sanity. But you do you 😊')">CHEM 131</a>
            <a href="question.php?course=CHEM132">CHEM 132</a>
            <a href="question.php?course=CHEM132&subjective=TRUE">CHEM 132 (subjective)</a>
            <a href="question.php?course=fsb">FSB 100</a>
            <a onclick="alert('There are no questions on this course yet 😥. Dude this is the last paper la. you still have time to go over it. But you do you 😊')">AEB 302.1</a>
        </div>
        <div id="show-more" class="btn">Show More --&gt;</div>
        
    </section>
    <!-- About the deverlopers -->
    <h1 style="margin-top:10vh !important;text-align:center;font-size:2.3rem;" class="title mB-3">Meet the Developers</h1>
    <section class="developers">
        

        <div class="card">
            <div class="profile">
               <img src="./images/dev1.jpg" alt=""> 
               <div class="details">
                    <h3>Dr. Victoria Atikueke</h3>
                    <h4>Vicky Special</h4>
               </div>

            </div>
            <div class="about">
                
                <p>Vicky the super model is the lead App tester. She is wonderful and surprisingly very good at guessing 😂. She is also astervicks emotional support 😘</p>
                <div>

                    <i class="fa fa-phone"></i> <b>+234 906 723 6083</b>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="profile">
                
                <img src="./images/dev2.jpg" alt=""> 
                <div class="details">
                    <h3>Dr. Aga Divine</h3>
                    <h4>Aga K Divine</h4>
                </div>
            </div>
            <div class="about">
                
                <p>Divine is the great question Proliferer. I hope this is a word 😁 She gave about 20% of total questions used in the app. And a good cook too 😏</p>
                <div>

                    <i class="fa fa-phone"></i> <b>+234 810 401 8710</b>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="profile">
                
                <img src="./images/dev4.jpg" alt="">
                <div class="details">
                    <h3>Dev. Thomas Arinze</h3>
                    <h4>Astervicks.js</h4>
                </div>
            </div>
            <div class="about">
               
                <p>CEO and Lead Developer @ <b>KORATANA GROUP OF COMAPANIES</b>Highly misunderstood and a pretty facinating creature when you do get to know him 🤗</p>
                <div>

                    <i class="fa fa-phone"></i> <b>+234 806 608 6714</b>
                </div>
                <div>
                    <i class="fa fa-envelope"></i> vithomas335@gmail.com
                </div>
            </div>
        </div>
    </section>
    <?php include_once "./footer.php" ?>
</body>
<script src="./index.js"></script>
<!-- <script src="./fontawesome-free-6.2.1-web/js/all.js"></script> -->
</html>