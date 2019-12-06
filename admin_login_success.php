<?php

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location: admin_login_page.php");
}

?>

<h2 align="center">
    You have successfully logged in as an admin!
</h2>
