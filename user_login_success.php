<?php

session_start();

echo "
Hello " . $_SESSION['user_name'] . "!<br>
You've successfully logged in.
";

if (!isset($_SESSION['logged_in_as_user']) || $_SESSION['logged_in_as_user'] == false) {
    header("Location: user_login_page.php");
}