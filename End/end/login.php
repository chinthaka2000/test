<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<style>
			.form-container {
				width: 300px;
				margin: 0 auto;
				margin-top: 20px;
			}
			.form-group {
				margin-bottom: 15px;
			}
			.form-group label {
				display: block;
			}
			.form-group input {
				width: 100%;
				padding: 8px;
				box-sizing: border-box;
			}
			.error, .message {
				display: flex;
				justify-content: center;
				align-items: center;
				color: red;
				margin-top: 5px;
				padding: 8px;
				box-sizing: border-box;
				text-align: center;
			}
			.message {
				color: green;
			}

		</style>
	</head>
	<body>
		<center><h2>Welcome</h2></center>
		<div class="form-container">
			<form action="login.php" method="POST">
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="username">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<div class="form-group">
					<input type="submit" id="login" name="login" value="Log-In">
				</div>
				<div class="form-group">
					<a class="btn btn-primary" href="registration.php" name='register' role="button">Register</a>
				</div>
			</form>
		</div>
	</body>
<html>

<?php
	require_once("connection.php");
	if(isset($_POST['register'])){
		header("Location:registration.php");
		exit();
	}
	if(isset($_POST['login'])){
		//collect email and password
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		
		$sql = "SELECT * FROM user WHERE email = '$email'"; //encase the email in single quotes
		$result = mysqli_query($conn, $sql);//get query results
		$user_result = mysqli_fetch_assoc($result); // return associate array
		
		if($user_result){
			if(password_verify($password, $user_result['password'])){ //verify the password
				echo "<div class='message'>Successfully logged in</div>";//with hashed password
				header("Location:main.php");
				exit();
			}
			else{
				echo "<div class='error'>Password does not available</div>";
			}
		}
		else{
			echo "<div class='error'>Email does not match</div>";
		}
	}
?>