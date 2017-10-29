<?php
	session_start();
	require_once("connection.php");
	include("process.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>The FaceBook </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		*{
			background-color: white;
		}
		body{
			display: table-caption;
			}
		#container{
			display: inline-flex;
				}
		.register{
			border-style: groove;
			border-width: 30px;
				}
		.login{
			border-style: groove;
			border-width: 30px;
			position: relative;
		    left: 800px;
		   
				}
		h1{
			position: relative;
		    left: 350px;
		    padding-top: 60px;
				}
	</style>
</head>
<body>
	<div id="container">
		<div class="register">
			<form method="POST" action="process.php"><br>
			<input type="hidden" name="facebook" value="facebook">
				Name:<input type="text" name="name" placeholder="your name"><br>
				Email:<input type="email" name="email" placeholder="your Email"><br>
				Password:<input type="password" name="password" placeholder="your password"><br>
				Confirm Password:<input type="password" name="confirm_password" placeholder="confirm your password"><br>
				<input type="submit" name="register" value="Register">
			</form>
		</div>
		<div>
		<h1>The Our Face Book</h1>
		</div>
		<div class="login">
			<form method="POST" action="process.php">
				<input type="hidden" name="facebook1" value="facebook">
				Email:<input type="email" name="email1" placeholder="your email"><br>
				Password:<input type="password" name="password1" placeholder="your Password"><br>
				<input type="submit" name="login" value="LogIn">
					
			</form>
			
		</div>
	</div>

</body>
</html>
