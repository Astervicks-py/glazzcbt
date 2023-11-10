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
    <?php include_once "./darkcover.php" ?>
    <div class="confirmed-alert-box" style="display:none">
        <div class="checkmark-img-cont">
            <img src="./images/checkmark.png" alt="">
        </div>
        <p><span class="copied-account-number"></span> Has been Copied successfully</p>
        <button class="close-btn mT-1">Close</button>
    </div>


    <div class="payment-cont page-cont">
        <div class="title">
            <h1>Payment Plans</h1>
        </div>

        <div class="payment-options">
            <div class="card">
                <div class="card-heading">
                    <h3>Advantages</h3>
                </div>
                <div class="card-body">
                    <ul class="advantages" >
                        <li><img src="./images/seen.png">Edit Profile Picture</li>
                        <li><img src="./images/seen.png">Access to exclusive explanations</li>
                        <li><img src="./images/seen.png">Access to subjective questions</li>
                    </ul>
                    <button class="pay-btn">PAY NOW</button>
                </div>
            </div>
            <div class="card">
                <div class="card-heading">
                    <h3>Monthly</h3>
                </div>
                <div class="card-body">
                    <p class="text">Get Access for a full month</p>
                    <h2 class="price">N300</h2>
                    <button class="pay-btn">PAY NOW</button>
                </div>
            </div>
            <div class="card">
                <div class="card-heading">
                    <h3>Semester</h3>
                </div>
                <div class="card-body">
                    <p class="text">Get Access for a full semester and get a <br/><span class="discount">40% discount</span></p>
                    <h2 class="price">N500</h2>
                    <button class="pay-btn">PAY NOW</button>
                </div>
            </div>
            <div class="card">
                <div class="card-heading">
                    <h3>Yearly</h3>
                </div>
                <div class="card-body">
                    <p class="text">Get Access for a full Year and get a <br/><span class="discount">55% discount</span></p>
                    <h2 class="price">N2000</h2>
                    <button class="pay-btn">PAY NOW</button>
                </div>
            </div>
        </div>


        <div class="title" style="margin-top:20px !important">
            <h1>Account Details</h1>
        </div>

         <div class="payment-options">
            <div class="card">
                <div class="card-heading">
                    <h3>Account 1</h3>
                </div>
                <div class="card-body">
                    <h2>Keystone Bank</h2>
                    <h3>Thomas Arinzechukwu Victor</h3>
                    <h1>6036075674</h1>
                    <button class="pay-btn copy-btn mT-2">Copy</button>
                </div>
            </div>
            <div class="card">
                <div class="card-heading">
                    <h3>Account 2</h3>
                </div>
                <div class="card-body">
                    <h2>First Bank</h2>
                    <h3>Thomas Esther Chisom</h3>
                    <h1>3046046898</h1>
                    <button class="pay-btn copy-btn mT-2">Copy</button>
                </div>
            </div>
           
        </div>
        
        
    </div>
<?php include "./footer.php" ?>
</body>
<script>
    function $(element)
    {
        return document.querySelector(element);
    }

    $('.darkCover').style.display = "none";

    const copyBtns = document.querySelectorAll(".copy-btn");
    copyBtns.forEach((btn)=>{
        btn.onclick = (e) =>{
            $('.darkCover').style.display = "block";
            let accountNumber = e.target.parentNode.querySelector('h1').innerHTML;

            let text = e.target.parentNode.querySelector('h1');
            try{
                navigator.clipboard.writeText(text.innerHTML)
                console.log("Content Copied")
            }catch(err)
            {
                console.log("Failed to copy")
            }
        
            $('.copied-account-number').innerHTML = accountNumber;
            $('.confirmed-alert-box').style.display = "flex";
            console.log($('.confirmed-alert-box').style.display)
        }
    })

    $(".close-btn").onclick =() =>{
        $('.darkCover').style.display = "none";
        $('.confirmed-alert-box').style.display = "none";
    }

</script>
</html>