<!DOCTYPE html>

<?php

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: admin_login_success.php");
}

if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {

}

?>

<html lang="en">
<body>

<h2 align="center">
    Admin Login
</h2>

Please enter your login information.<br/><br/>

<form method="post" action="login_page.php">

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