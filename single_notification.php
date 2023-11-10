<?php
    $link = "";
    $color ="#fff";
    if($notific['topic'] == "custom_question")
    {
        $link = "./custom_questions.php#".$notific['identify_id']."";
    }

    if(!$notific['read'])
    {
        $color = "#0f0";
    }
?>
<a href=<?php echo $link ?> class="notification pd-1 mB-1">
    <p class="message" style="color:<?php echo $color ?>"><?php echo $notific['message']?></p>
    <i class="date"><?php $notific['date'] ?></i>
</a>