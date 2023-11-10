<?php 

require_once "./header.php";
$follow = new Follow();
if(isset($_GET['id']))
{   
    $friend_id = $_GET['id'];
    $user = new User();
    $sql = "SELECT * FROM users WHERE user_id = '$friend_id'";
    if($friend = $DB->read($sql))
    {
        $friend = $friend[0];
    }

    $back_link = "#";
    if(isset($_SERVER['HTTP_REFERER']))
    {
        $back_link = $_SERVER['HTTP_REFERER'];
    }
}else{
    header("loaction:login.php");
    die();
}
$followers = $follow->get_followers($friend_id,"followers");
$following = $follow->get_followers($friend_id,"following");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>
<?php include './nav-bar.php' ?>
<?php include './decor.php' ?>
<?php include './sidebar.php' ?>

<div class="user-section" data-friend_id="<?php echo $friend_id?>">
    <a href="<?php echo $back_link ?>">
        <button class="back-btn mT-1 mB-1">
            <img src="./images/left-arrow.png" alt="">
        </button>
    </a>
    <div class="user_info">
        <div class="img"><img style="object-fit:cover;object-position:center" src="./images/profile_img/<?php echo $user->user_data($friend_id,"profile_img")['profile_img'] ?>" alt=""></div>
        <div class="user_details">
            <h2><?php echo ucfirst($friend['username']) ?></h2>
            <div class="follow-stats">
                
                <div class="followers">Followers: <span class="followers-count"><?php echo count($followers) ?></span></div>
                <div class="following">Following: <?php echo count($following) ?></div>
            </div>
            <?php 
                $btn_text = in_array($user_id,$followers) ? "Unfollow" : "Follow"

            ?>
            <button id="follow_btn" onclick="follow(event)" style="font-weight:bold" class="mT-1"><?php echo $btn_text ?></button>
        </div>
    </div>

    <div id="custom_question_cont" class="questions-cont">

    </div>
</div>

</body>
<script src="./javascript/friend_profile.js"></script>
</html>
