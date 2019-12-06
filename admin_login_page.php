<!DOCTYPE html>

<?php

session_start();

$admin_email = "a_email@gmail.com";
$admin_password = "my_pass";

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header("Location: admin_login_success.php");
}

if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
    if ($_POST['admin_email'] == $admin_email && $_POST['admin_password'] == $admin_password) {
        $_SESSION['loggedIn'] = true;
        header("Location: admin_login_success.php");
    }
}

?>

<html lang="en">
<body>

<h2 align="center">
    Admin Login
</h2>

Please enter your login information.<br/><br/>

<form method="post" action="admin_login_page.php">

    <b>Email:</b><br/>
    <label>
        <input type="email" name="admin_email">
    </label><br/>

    <b>Password:</b><br/>
    <label>
        <input type="password" name="admin_password">
    </label><br/>

    <label>
        <input type="submit" value="Login">
    </label><br/>

</form>

</body>
</html>