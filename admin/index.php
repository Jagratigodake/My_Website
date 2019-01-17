<?php

session_start();

if(isset($_SESSION['loggedin'])){
	if($_SESSION['loggedin'] == true){
		header("location: ../endpoints/data.php");
	}
}


?>

<html>
<head>
<title>log in page</title>
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link rel="stylesheet" href="loginpage.css">
</head>
<body>

<div class="login-banner">
 <form method="post" action="login.php">
	<h3 class="login-head">Login</h3>
	<?php
		if(isset($_GET['error'])){
			if($_GET['error'] == 1){
				?>
				<div class="row">
					<h6 style="color:red">Invalid username or password</h6>
				</div>
				<?php
			}
		}
	?>
	<div class="row">
		<input type="text" class="input-item" placeholder="username" name="username" required>
	</div>
	<div class="row">
		<input type="password" class="input-item" placeholder="Password" name="password" required>
	</div>
	<div class="row">
		<button type= "submit"  value="submit"class="login-button">Login</button>
	</div>
	</form>
</div>

</body>

</html>