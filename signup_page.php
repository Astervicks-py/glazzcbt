<?php

include_once "./includes/classes.php";

$DB = new DB();
$error = "";
$username = $email = $tel="";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
</head>
<style>
	body
	{
		height:100vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
<body>
	<div class="sign_container">
		<div class="left">
			<h2>GLAZZ CBT</h2>
			<h1>WELCOME </h1>
			<p>Ready to join the elite 😎</p>
		</div>
		
		<form action="signup_page.php"  method="POST" class="right">
			<div class="error" style="background:#fcc;text-align:center"><?php echo $error ?></div>
			<div class="form-control">
				<label for="username">Username <i class="fa fa-user"></i></label>
				<input type="text" name="username" placeholder="James Bond" >
			</div>
			<div class="form-control">
				<label for="password">Password <i class="fa fa-eye"></i></label>
				<input type="password" name="pwd" placeholder="*************" >
			</div>
			<div class="form-control">
				<label for="repeat-password">Repeat Password <i class="fa fa-eye"></i></label>
				<input type="repeat-password" name="repeat_pwd" placeholder="*************">
			</div>
			<button style="cursor:pointer" class="btn">Register <i style="color:#0f0" class="fa fa-check-circle"></i></button> 
			<p>Already Have an account <a href="login_page.php">Login</a></p>
		</form>
	</div>
</body>
<script src="./javascript/signup.js"></script>
</html>