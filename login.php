<?php
    include 'header.php';

    if(isset($_GET["signup"])) {
        if($_GET["signup"] == "success") {
            echo '<p class="success">You have signed up!</p>';
        }
    }
?>

<section>
    <h2>Log In!</h2>

    <form action="includes/login.inc.php" method="POST">
    <input type="text" name="uid" placeholder="Username/Email">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit" name="submit">Log In</button>
</form>
</section>

<?php
// !ERRORS
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput" ) {
        echo '<p class="error">Please fill in all the fields!</p>';
    }
    else if ($_GET["error"] == "wronglogin") {
        echo '<p class="error">Wrong login!</p>';
    }
}


?>

<?php
    include 'footer.php';
?>