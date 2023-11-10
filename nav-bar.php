<?php include_once "./includes/classes.php"; 
    $user_id = $_SESSION['id'];
    $user = new User();
    $is_premium = $user->user_data($user_id, "is_premium")['is_premium'];
    $is_admin = $user->user_data($user_id,"is_admin")['is_admin'];
    $profile_img = $user->user_data($user_id,"profile_img")['profile_img'];
        
?>
<nav>
    <h3>GLAZZ CBT</h3>
    <div class="user">
        <a class="nav-item active" href="./index.php">Home</a>
        <?php 
           
            if($is_admin):
        ?>
            <a class="nav-item" href="./adminPage.php">ADMIN</a>
        <?php endif; ?>

        <a class="nav-item" href="./tables.php">LeaderBoards</a>
        <?php 
            $notific = new Notification();
            $user_id = $_SESSION['id'];
            $count = $notific->number_of_unread_notification($user_id);
        ?>
        <a href="./notification.php" class="nav-item notific-link">Notifications 
            <?php if($count > 0) : ?>
            <span class="notific-count"><?php echo $count?></span>
            <?php endif; ?>
        </a>
        <a class="nav-item" href="./#courses">Courses</a>
        <a class="nav-item" href="./custom_questions.php">Questions</a>
        <?php if(!$is_premium): ?>
            
            <a style="color:var(--clickable);text-decoration:none" class="nav-item" href="./payment.php">
                Get premium
            </a>
        <?php endif; ?>
        <a href="./includes/logout.inc.php" class="nav-item">
            <img src="./images/white-logout.png" >
        </a>
        

        <a id="logged-username" href="user.php?id=<?php echo $user_data['user_id']?>">
            <!-- <h4> <//?php echo ucfirst($user_data['username']) ?></h4> -->
            <img style="object-fit:cover;object-position:center;width:35px;
            height:35px;vertical-align:middle" src="./images/profile_img/<?php echo $profile_img ?>" alt="">
        </a>
    </div>
    <div class="hamburger">
        <div class="stroke"></div>
        <div class="stroke"></div>
        <div class="stroke"></div>
    </div>
</nav>

<script>
    function $(element) {
	return document.querySelector(element);
}



let open = false;
$(".hamburger").onclick = () => {
	console.log("clicked");
	$(".hamburger").classList.remove("open");
	if (open) {
		$(".side-cont").style.transform = "translateX(100%)";
		setTimeout(() => {
			$(".black-cover").style.transform = "translateX(100%)";
			$(".sidebar").style.transform = "translateX(100%)";
		}, 1000);
		open = false;
	} else {
		$(".hamburger").classList.add("open");
		$(".sidebar").style.transform = "translateX(0%)";
		$(".black-cover").style.transform = "translateX(0%)";
		setTimeout(() => {
			$(".side-cont").style.transform = "translateX(0%)";
		}, 1000);
		open = true;
	}
};

</script>