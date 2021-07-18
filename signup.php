<?php
    include 'header.php';
?>

<section>
    <h2>Sign up!</h2>

    <form action="includes/signup.inc.php" method="POST">
    
    <input type="text" name="name" placeholder="Full name">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdconfirm" placeholder=" Confirm Password">


    <button type="submit" name="submit">Sign up</button>
</form>
</section>

<!-- Errors -->
<?php 

if (isset($_GET["error"])) {

    //? error=emptyinput
    if ($_GET["error"] == "emptyinput") {
        echo '<p class= "error">*Please fill in all the fields!</p>';
    }
    // ? error=invaliduid
    else if ($_GET["error"] == "invaliduid") {
        echo '<p class= "error">*Choose a proper username!</p>';
    }

    //? error=invalidemail

    else if ($_GET["error"] == "invalidemail") {
        echo '<p class= "error">*Choose a valid Email!</p>';
    }

    // ?error=passwordsdontmatch
    else if ($_GET["error"] == "passwordsdontmatch") {
        echo '<p class= "error">*Passwords don\'t match!</p>';
    }

    // ?stmtfailed
    else  if ($_GET["error"] == "stmtfailed") {
        echo '<p class= "error">Something went wrong!</p>';
    }
    
    // ?error=usernametaken
    else if ($_GET["error"] == "usernametaken") {
        echo '<p class= "error">*Username not available!</p>';
    }
}

?>



<?php
    include 'footer.php';
?>