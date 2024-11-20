<!-- Headder.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Welcome</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <ul class="topnav">
    <li><a class="active" href="main.php">Home</a></li>
	<li><a href="create.php">Create</a></li>
    <li><a href="inventory.php ">inventory</a></li>
    
    <?php
	session_start();
    if(isset($_SESSION["username"])){
        echo '<li class="right"><a href="logout.php">Logout!</a></li>';
        echo '<li class="right"><a href="#" style="background-color: #4017e4";>Hi '.$_SESSION["username"].'!</a></li>';
    }else{
        // echo '<li class="right"><a href="login.php">Login</a></li>';
    }
    ?></li>
    </ul>
    <div class="container" style="margin:20px"></div>
