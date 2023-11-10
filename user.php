<?php 

require_once "./header.php";
require_once "./includes/classes.php";
$user_id = $_SESSION['id'];
$follow = new Follow();
$followers = $follow->get_followers($user_id,"followers");
$following = $follow->get_followers($user_id,"following");
$user = new User();

$profile_img = $user->user_data($user_id,"profile_img")['profile_img'];


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
<style>
        .img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            object-position: center;
		}

		.img {
			position: relative;
			width: 100px;
			height: 100px;
			border-radius: 50%;
			overflow: hidden;
		}

		.img img.settings {
			width: 25px;
			height: 25px;
		}

		.settings-cont {
			position: absolute;
			bottom: 0;
			width: 100%;
			background: #0009;
			display: flex;
			align-items: center;
			justify-content: center;
            cursor:pointer;
		}
	</style>
</style>
<body>
    <?php include './nav-bar.php' ?>
<?php include './decor.php' ?>
<?php include './sidebar.php' ?>
<div class="user-section" data-friend_id="<?php echo $user_id?>">
    <div class="profile-cont">
        <div class="user_info">
            <form method="POST" class="img" enctype="multipart/form-data">
                <input type="file" name="profile" id="new_profile" class="profile-pic-input" hidden />
                <input type="submit" id="submit" name="submit" value="submit" hidden>
                <img
                    class="current_profile"
                    src="./images/profile_img/<?php echo $profile_img?>"
                    alt=""
                />
                <div class="settings-cont">
                    <img class="settings" src="./images/settings.png" alt="" />
                </div>
            </form>
            <div class="user_details">
                <h2><?php echo ucfirst($user_data['username']) ?></h2>
                <div class="follow-stats"> 
                    <div class="followers">Followers: <span class="followers-count"><?php echo count($followers) ?></span></div>
                    <div class="following">Following: <?php echo count($following) ?></div>
                </div>
                <?php 
                    $btn_text = in_array($user_id,$followers) ? "Unfollow" : "Follow"

                ?>
            </div>
        </div>
    </div>
</div>
<div class="nav-button" style="margin-bottom:2vh !important;gap:12px;z-index:50;position:relative">
    <a href="./index.php"><button type="submit" class="btn prev">Home</button></a>
    <a href="#custom_question_cont"><button type="submit" class="btn prev">My Questions</button></a>
    <a href="#"><button type="submit" class="btn prev">My Tests</button></a>
</div> 
<!-- LeaderBoard -->
<div style="text-align:left;font-size:2.3rem;" class="title mT-3 mB-1 pR-1 pL-2"></div>
<section style="margin-top:10px !important;" class="leaderboard">
    <h1 class="title">My Test</h1>
    <section class="table-body">
        <table>
            <colgroup>
                <col style="background:var(--primary);color: #fff;">
            </colgroup>
            
            <thead style="background:var(--primary);color:#fff">
                <tr>
                    <th>S/N</th>
                    <th>Course</th>
                    <th>date</th>
                    <th>Score (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $sql = "SELECT * FROM leaderboard WHERE username = '$username' ORDER BY date DESC";
                    $result = $DB->read($sql);
                    // print_r($result);
                    if ($result):
                        for ($i=0; $i < count($result); $i++) : ?>
                            <tr>
                                <th><?php echo $i + 1 ?></th>
                                <td><?php echo $result[$i]['course'] ?></td>
                                <td><?php echo $result[$i]['date']?></td>
                                <td><?php echo $result[$i]['score']?></td>
                            </tr>
                        <?php endfor ?>
                    <?php endif ?>

            </tbody>
            
        </table>
    </section>
        
    </div> 
    <!-- <div style="color:var(--primary);width:80%;margin:auto;font-size:2rem;text-align:right"></div> -->
</section>

<div class="cont">
    <h1 style="text-align:left;font-size:2.3rem;" class="title mT-2 mB-1 pR-1 pL-2">My Questions</h1>
    <div id="custom_question_cont" class="questions-cont">
        <!-- TO BE ADDED BY JAVASCRIPT AND PHP -->
    </div>
</div>

<!-- </div> -->
<?php include "./footer.php" ?>
</body>
<script>
    function $(e) {
        return document.querySelector(e);
    }

    $(".settings-cont").onclick = () => {
        $(".profile-pic-input").click();
        
        $(".profile-pic-input").onchange = () => {
            $("#submit").click();
            
        };

        
    };

   
</script>
<script src="./javascript/friend_profile.js"></script>
</html>
