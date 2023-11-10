<?php

include_once "./header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "decor.php" ?>
    <?php include_once "sidebar.php" ?>
    <div class="cont">
        <div class="taskbar mT-10 pd-1">
            <form method="GET" id="custom_question_form">
                <h2>Filter</h2>
                <div class="custom-select courses-select">
                    <select name="courses" id="filter">
                        <option value="all">All</option>
                        <option value="GES100">GES100</option>
                        <option value="GES101">GES101</option>
                        <option value="GES102">GES102</option>
                        <option value="GES103">GES103</option>
                        <option value="CHEM131">CHEM131</option>
                        <option value="CHEM132">CHEM132</option>
                        <option value="PHY102">PHY102</option>
                        <option value="AEB200">AEB200</option>
                    </select>
                </div>
                <button class="filter-btn" type="button"><a href="create.php" style="text-decoration:none;color:#000">CREATE QUESTION</a></button>
            </form>
            
        </div>

        <div id="custom_question_cont" class="questions-cont">
            <!-- TO BE ADDED FROM THE DATASEBASE BY JS -->
        </div>
    </div>
    
</body>
<script src="./javascript/custom_questions.js"></script>
</html>