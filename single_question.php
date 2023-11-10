<?php 
    $question_id = $result[$i]['question_id'];
    $sql = "SELECT * FROM questions WHERE question_id = '$question_id'";
    $qu = $DB->read($sql)[0];
?>
<section class="question">
    <h3>Question <b> <?php echo $i + 1 ?></b>&nbsp;</h3>
    <br>
    <?php if(!is_null($qu['img']) && !empty($qu['img']) && $qu['img'] != "" && $qu['img'] != " "): ?>
        <div style="width:100%;height:200px">
            <img style="width:100%;object-fit:contain;height:100%;border-radius:0" src="<?php echo $qu['img'] ?>" />

        </div
    <?php endif; ?>
    <p><?php echo $qu['question'] ?></p>
    <br>
    
    <div class="options">
        <div><input type="radio" name="question_<?php echo $i?>" value="<?php echo $qu['option_A'] ?>" required="required" id="">
        <?php echo $qu['option_A'] ?>
        </div>
        <div><input type="radio" name="question_<?php echo $i?>" value="<?php echo $qu['option_B'] ?>" id="">
            <?php echo $qu['option_B'] ?>
        </div>
        <div><input type="radio" name="question_<?php echo $i?>" value="<?php echo $qu['option_C'] ?>" id="">
            <?php echo $qu['option_C'] ?>
        </div>
        <div><input type="radio" name="question_<?php echo $i?>" value="<?php echo $qu['option_D'] ?>" id="">
            <?php echo $qu['option_D'] ?>
        </div>
        <input type="hidden" name="question_<?php echo $i ?>_id" value="<?php echo $qu['question_id'] ?>">
    </div>
    
</section>