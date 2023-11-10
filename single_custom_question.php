<?php 

    $option = json_decode($question['provided_options']);
    $isBool = $question['isBool'];
    $total = !$isBool ? $question['option_A'] + $question['option_C'] + $question['option_B'] + $question['option_D'] : $question['true_no'] + $question['false_no'];

    // ? Check if the user has already voted
    $VOTED = new Vote();
    $voted = $VOTED->has_voted($_SESSION['id'],$question['id']);
    // echo $voted;
?>
<section class="question">
    <div class="user-details-cont">
        <h4><?php echo $question['username'] ?></h4> 
        <span class="dot"></span>
        <button>Follow</button>
    </div>


    <h4>Course: <?php echo $question['course'] ?></h4>

    <p><?php echo $question['question'] ?></p>

    <div class="custom-questions-options-cont">
    
    <?php if(!$isBool): ?>
        <div class="opt">
            <?php $width = $total !== 0 ? ($question['option_A'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="option_A" value="<?php echo $option->option_A?>" id="opt-A">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value"><?php echo $option->option_A?></p>
        </div>

        <div class="opt">
            <?php $width = $total !== 0 ? ($question['option_B'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="option_B" value="<?php echo $option->option_B ?>" id="opt-B">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value"><?php echo $option->option_B ?></p>
        </div>

        <div class="opt">
            <?php $width = $total !== 0 ? ($question['option_C'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="option_C" value="<?php echo $option->option_C ?>" id="opt-C">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value"><?php echo $option->option_C ?></p>
        </div>

        <div class="opt">
            <?php $width = $total !== 0 ? ($question['option_D'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="option_D" value="<?php echo $option->option_D ?>" id="opt-D">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value"><?php echo $option->option_D ?></p>
        </div>

        <?php else: ?>
        <div class="opt">
            <?php $width = $total !== 0 ? ($question['true_no'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="true_no" value="true" id="opt-true">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value">TRUE</p>
        </div>

        <div class="opt">
            <?php $width = $total !== 0 ? ($question['false_no'] / $total) * 100 : 0 ;?>
            <?php if(!$voted) : ?>
                <input type="radio" name="pickedAnswer" data-option="false_no" value="false" id="opt-false">
            <?php endif; ?>
            <span class="poll" style="width:<?php echo $width ?>%;"><?php echo $width ?>%</span>
            <p class="option-value">FALSE</p>
        </div>
        
        <?php endif; ?>
    </div>

    <form action="">
        <input type="hidden" name="my_answer" value="" id="my_answer">
        <input type="hidden" name="selected_option" value="" id="selectedOption">
        <input type="hidden" name="question_id" value="<?php echo $question['id']?>" id="question_id">
    </form>
    
    <?php if($voted): ?>
        <button class="btn vote-btn" style="cursor:pointer">Submit</button>
        <?php else: ?>
            <button class="btn vote-btn" style="cursor:pointer">Show Votes</button>
    <?php endif;?>
    <div class="interact-btn-cont">
        <button><i class="">L</i></button>
        <button><i class="comment-btn">C</i></button>
        <button><i class="">O</i></button>
    </div>   
    
    <section class="comments-section">
        <div class="comments-cont">
            <?php include "single_comment.php" ?>
            
        </div>
        <form action="./includes/insert_comment.inc.php" method="POST" class="comment-input-cont">
            <input name="comment" type="text">
            <input type="hidden" name="question_id" value="<?php echo $question['id']?>">
            <button id="comment_btn">S</button>
        </form>
    </section>
</section>