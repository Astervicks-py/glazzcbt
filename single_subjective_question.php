<?php 
    $question_id = $result[$i]['question_id'];
    $sql = "SELECT * FROM questions WHERE question_id = '$question_id'";
    $qu = $DB->read($sql)[0];
?>
<section class="question">
    <h3>Question <b> <?php echo $i + 1 ?></b>&nbsp;</h3>
    <br>
    <p><?php echo $qu['question'] ?></p>
    <br>
<?php if(!is_null($qu['img']) || !empty($qu['img']) || $qu['img'] != ""): ?>
    <div style="width:100%;height:200px">
        <img style="width:100%;object-fit:contain;height:100%;border-radius:0" src="<?php echo $qu['img'] ?>" />

    </div>
<?php endif; ?>    
    <div class="options">
        <input autocomplete=FALSE type="text" name="question_<?php echo $i?>" id="">
        <input type="hidden" name="question_<?php echo $i ?>_id" value="<?php echo $qu['question_id'] ?>">
    </div>
    
</section>