<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
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
		<center><h2>Welcome </h2></center>
		<div class="form-container">
			<form action="registration.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="username">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<div class="form-group">
					<label for="username">Repeat - Password</label>
					<input type="password" id="rpt_password" name="rpt_password" required>
				</div>
				<div class="form-group">
					<input type="submit" id="register" name="register" value="Register">
				</div>
				<div class="form-group">
					<a href="login.php" name="login">Login</a>
				</div>
			</form>
		</div>
	</body>
<html>

<?php
	//include database connection_aborted
	require_once("connection.php");
	
	//check whether request method is POST
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		
		//remove whitespaces
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$rpt_password = trim($_POST['rpt_password']);
		
		if(isset($_POST['login'])){
			header("Location:login.php");
			exit();
		}
		
		//create a hashed password
		$password_hash = password_hash($password, PASSWORD_DEFAULT); //apply default hash
		
		//create an error array
		$errors = array();
		
		//check whether the input fields are empty or not
		if(empty($username) || empty($password) || empty($email)){
			array_push($errors, "All fields are required");
		}
		
		//check whether the email is valid
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Email is not valid");
		}
		
		//check whether the password length is at least 8
		if(strlen($password) < 8){
			array_push($errors, "Password must be minimum 8 characters");
		}
		
		//check whether passwords are matching
		if($password !== $rpt_password){
			array_push($errors, "Passwords do not match");
		}
		
		//retreive email from the user table
		$sql = "SELECT * FROM user WHERE email = '$email'";
		//execute the query
		$result = mysqli_query($conn, $sql);
		$row_result = mysqli_num_rows($result);
		
		//check whether the user already exists or not
		if($row_result > 0){
			array_push($errors, "Email already registered");
		}
		
		//if error array is not empty
		if(count($errors) > 0){
			//iterate through a for each loop
			foreach ($errors as $error){
				echo "<div class='error'> $error </div>";
			}
		}
		else{
			$sql = "INSERT INTO user(name, email, password) VALUES (?,?,?)";
			$stmt = mysqli_stmt_init($conn); //initialize mysql statement and return stmt object
			$stmt_prepare = mysqli_stmt_prepare($stmt, $sql); //prepare mysql statemt - return true, false
			
			if($stmt_prepare){
				mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password_hash);
				mysqli_stmt_execute($stmt);
				echo "<div class='message'>User successfully created</div>";
				header("Location: login.php");
				exit();
			}
			else{
				die("Something went wrong");
			}
		}
	}
?>