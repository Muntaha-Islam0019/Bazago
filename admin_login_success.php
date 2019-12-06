<?php

session_start();

echo "
<b>Hello " . $_SESSION['admin_name'] . "</b>!<br>
You've successfully logged in.
";

if (!isset($_SESSION['logged_in_as_admin']) || $_SESSION['logged_in_as_admin'] == false) {
    header("Location: admin_login_page.php");
}