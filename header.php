<?php 
    session_start(); 
    include_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>

            <?php
                if(isset($_SESSION["useruid"])) {
                    echo '<li><a href="profile.php">Profile</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                else {
                    echo '<li><a href="login.php">Log In</a></li>';

                    echo '<li><a href="signup.php">Sign Up</a></li>';
                }

            ?>
            
            
            
            
        </ul>
    </nav>