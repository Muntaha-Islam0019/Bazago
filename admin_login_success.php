<?php

session_start();

if (!isset($_SESSION['logged_in_as_admin']) || $_SESSION['logged_in_as_admin'] == false) {
    header("Location: admin_login_page.php");
}

?>

<h2 align="center">
    You have successfully logged in as an admin!
</h2>
