<?php 
    $notific = new Notification();
    $user_id = $_SESSION['id'];
    $user = new User();
    $username = $user->user_data($user_id)['username'];
    $count = $notific->number_of_unread_notification($user_id);
    $is_admin = $user->user_data($user_id,"is_admin")['is_admin'];
    $is_premium = $user->user_data($user_id, "is_premium")['is_premium'];
    
    $profile_img = $user->user_data($user_id,"profile_img")['profile_img'];

?>

<div class="sidebar">
    <div class="black-cover"></div>
    <div class="side-cont">
        <!-- <a id="logged-username" href="user.php?id=<//?php echo $user_data['user_id']?>"> -->
            <!-- <h4> <//?php echo ucfirst($user_data['username']) ?></h4> -->
            <a id="logged-username" href="user.php?id=<?php echo $user_data['user_id']?>" style="text-decoration:none;display:flex;gap:10px;align-items:center">
                <img style="object-fit:cover;object-position:center;width:35px;
                height:35px;vertical-align:middle" src="./images/profile_img/<?php echo $profile_img ?>" alt=""><h2 style="color:var(--clickable);"><?php echo strtoupper($username) ?></h2>
            </a>
            
        <!-- </a> -->
        <!-- <a href="./user.php?id=<?php echo $user_data['user_id']?>" class="side-item name"><//?php echo $username?></a> -->
        <a href="./index.php" class="side-item">Home</a>
        <?php 

        if($is_admin):
        ?>
            <a class="nav-item" href="./adminPage.php">ADMIN</a>
        <?php endif; ?>
        <a href="tables.php" class="side-item">LeaderBoards</a>
        
        <a href="./notification.php" class="side-item notific-link">Notifications 
            <?php if($count > 0) : ?>
            <span class="notific-count"><?php echo $count?></span>
            <?php endif; ?>
        </a>
        <a href="./custom_questions.php" class="side-item">Questions POOL</a>
        <a href="#courses" class="side-item">Courses</a>
        <a href="./create.php" class="side-item">Create Question</a>
        <a href="#" class="side-item">contacts</a>
        <a href="./includes/logout.inc.php" class="side-item">
            <img src="./images/white-logout.png" >
        </a>
        <?php if(!$is_premium): ?>
            
            <a style="background:var(--clickable); display:flex;
            align-items:center;color:#000;" class="side-item" href="./payment.php">
                Get premium <img src="./images/premium.png" alt="">
            </a>
        <?php endif; ?>
    </div>
</div>

<script>

    function $(element) {return  document.querySelector(element)};
    let openSideBar = false;
    $(".hamburger").onclick = () => {
        console.log("clicked");
        $(".hamburger").classList.remove("open");
        if (openSideBar) {
            $(".side-cont").style.transform = "translateX(100%)";
            setTimeout(() => {
                $(".black-cover").style.transform = "translateX(100%)";
                $(".sidebar").style.transform = "translateX(100%)";
            }, 1000);
            openSideBar = false;
        } else {
            $(".hamburger").classList.add("open");
            $(".sidebar").style.transform = "translateX(0%)";
            $(".black-cover").style.transform = "translateX(0%)";
            setTimeout(() => {
                $(".side-cont").style.transform = "translateX(0%)";
            }, 1000);
            openSideBar = true;
        }
    };
</script>