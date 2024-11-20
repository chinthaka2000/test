<!-- index.php -- This is the home page -->
<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Welcome</title>
</head>
<body>
    <nav>
    <ul class="topnav">
    <li><a class="active" href="index.php">Home</a></li>
    <!-- <li><a href="#news">About</a></li>
    <li><a href="#contact">Contact</a></li> -->
    
    <li class="right"><a href="login.php">Login</a></li
    </ul>
    <div class="container" style="margin:20px"></div>
    </nav>
    <div>
    <h1><center>Welcome UoJ Startup Program</h1></center>
    </div>
    
    <?php 
    include_once 'footer.php'; 

?>