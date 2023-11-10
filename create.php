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

    <form class="create_custom_questions" action="./includes/custom_questions.inc.php" method="GET">
        <div class="instructions">
            <h2 class="" style="padding:3px 10px;width:100%;background:var(--primary);font-family:font7;letter-spacing:.2rem;">Instruction</h2>
            <p>After writing your question you can decide to use the <b>TRUE/FALSE</b> or the <b>OPTIONS(A-D)</b> in the answer delivery by toggling on or off the <b>Use True/False </b> checkbox</p>
            <p> The buttons beside the options is used in indicating the answer to the question. <span class="red" >make sure that an answer is selected before submitting</span></p>
            
        </div>
        <div class="form-control">
            <label for="question">Question</label>
            <textarea required name="question" id="question" cols="30" rows="5"></textarea>
        </div>
        <div class="form-control">
            <input type="checkbox" name="boolOrOptions" id="bool">
            <label for="bool">Use True/False</label>
        </div>
        <div class="form-control">
            <div class="custom-select courses-select">
                COURSE: 
                <select name="course" id="filter">
                    <option value="all">All</option>
                    <option value="GES100">GES100</option>
                    <option value="GES101">GES101</option>
                    <option value="GES102">GES102</option>
                    <option value="GES103">GES103</option>
                    <option value="CHEM131">CHEM131</option>
                    <option value="CHEM132">CHEM132</option>
                    <option value="PHY102">PHY102</option>
                    <option value="AEB200">AEB200</option>
                    <option value="FSB">FSB</option>
                </select>
            </div>
            
        </div>
        <div class="form-control option">
            <div>
                <input value="" type="radio" required name="answer" id="">
            </div>
            <div>
                <label for="option_a">Option A</label>
                <textarea name="option_A" id="" cols="30" rows="1"></textarea>
            </div>
            
        </div>
        <div class="form-control option">
            <div>
                <input  value="" type="radio" name="answer" id="">
            </div>
            <div>
                <label for="">Option B</label>
                <textarea name="option_B" id="" cols="30" rows="1"></textarea>
            </div>
            
        </div>
        <div class="form-control option">
            <div>
                <input  value="" type="radio" name="answer" id="">
            </div>
            <div>
                <label for="">Option C</label>
                <textarea name="option_C" id="" cols="30" rows="1"></textarea>
            </div>
            
        </div>
        <div class="form-control option">
            <div>
                <input  value="" type="radio" name="answer" id="">
            </div>
            <div>
                <label for="">Option D</label>
                <textarea name="option_D" id="" cols="30" rows="1"></textarea>
            </div>
            
        </div>
        <div class="form-control bool hide">
            <div>
                <input  value="true" type="radio" name="answer" id="">
            </div>
            <div>
                <label for="">TRUE</label>
            </div>
            
        </div>
        <div class="form-control bool hide">
            <div>
                <input  value="false" type="radio" name="answer" id="">
            </div>
            <div>
                <label for="">FALSE</label>
            </div>
            
        </div>
        <input type="hidden" name="answer" id="answer">
        <button id="submit">CREATE</button>
    </form>
</body>
<script src="./javascript/submit_custom_question.js"></script>
</html>