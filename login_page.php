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
			<p>Let's Get you ready shall we😎</p>
		</div>
		<form class="right">
			<div class="error" style="background:#fcc;text-align:center"></div>
			<div class="form-control">
				<label for="username">Username <i class="fa fa-user"></i></label>
				<input type="text" placeholder="James Bond" name="username">
			</div>
			<div class="form-control">
				<label for="password">Password <i class="fa fa-eye"></i></label>
				<input type="password" placeholder="*************" name="pwd">
			</div>
			<button style="cursor:pointer" class="btn" style="cursor:pointer">Log In <i style="color:#0f0" class="fa fa-check-circle"></i></button> 
			<p>Don't Have an account? <a href="signup_page.php">Signup</a></p>
		</form>
	</div>
</body>
<script src="./javascript/login.js"></script>
</html>