<?php

require_once "./header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <!-- <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>
    <?php include_once "./loader.php" ?>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "decor.php" ?>
    <?php include_once "sidebar.php" ?>
    <div class="page-cont">
        <h1 style="margin-top:calc(10vh + 20px) !important;text-align:left;font-size:2.3rem;" class="title mB-3 pR-1">Notifications</h1>
        
        <div class="notific-cont">
            <?php 
                $sql =  "SELECT * FROM notification WHERE user_id = '".$user_id."'";
                $notifications = $DB->read($sql);
                if(is_array($notifications))
                {
                    foreach ($notifications as $notific) {
                        include "./single_notification.php";
                    }
                }else{
                    echo "<div style='width:100%;background:#fff7;border:solid 2px #fff;border-radius:20px;' class='pd-2'>No notifications</div>";
                }

            ?>

        </div>
    </div>
    
    
    
<?php 
    $sql = "UPDATE notification SET `read` = 1 WHERE user_id = '".$user_id."'";
    // echo $sql;
    // die();
    $DB->save($sql);
?>
    <?php include_once "./footer.php" ?>
</body>
<!-- <script src="./fontawesome-free-6.2.1-web/js/all.js"></script> -->
</html>