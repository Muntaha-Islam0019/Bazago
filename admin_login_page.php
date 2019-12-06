<!DOCTYPE html>

<?php

session_start();

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "bazago";

$connection_to_mysql = mysqli_connect($server_name, $user_name, $password, $database_name);

if (isset($_POST['admin_email'])) {

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $sql = "select * from admin where e_mail = '" . $admin_email . "' and Password = '" . $admin_password . "' limit 1";

    $result = $connection_to_mysql->query($sql);

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        header("Location: admin_login_success.php");
    }

    if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
        if ($result->num_rows == 1) {
            $_SESSION['loggedIn'] = true;
            header("Location: admin_login_success.php");
        } else {
            echo "Please enter correct information.<br>";
        }
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