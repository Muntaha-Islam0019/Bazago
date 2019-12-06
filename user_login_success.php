<?php

session_start();

if (!isset($_SESSION['logged_in_as_user']) || $_SESSION['logged_in_as_user'] == false) {
    header("Location: user_login_page.php");
}

?>

<h2 align="center">
    You have successfully logged in as a user!
</h2>
