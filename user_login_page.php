<!DOCTYPE html>

<?php

session_start();

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "bazago";

$connection_to_mysql = mysqli_connect($server_name, $user_name, $password, $database_name);

if (isset($_POST['user_email'])) {

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $matching_info = "select * from user where e_mail = '" . $user_email . "' and Password = '" . $user_password . "' limit 1";
    $user_name_finding = "select user_name from user where e_mail = '" . $user_email . "' and Password = '" . $user_password . "'";

    $result_of_matching = $connection_to_mysql->query($matching_info);
    $result_of_username = $connection_to_mysql->query($user_name_finding);

    if ($result_of_username) {
        $row = $result_of_username->fetch_assoc();
        $_SESSION['user_name'] = $row["user_name"];
    }

    if (isset($_SESSION['logged_in_as_user']) && $_SESSION['logged_in_as_user'] == true) {
        header("Location: user_login_success.php");
    }

    if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
        if ($result_of_matching->num_rows == 1) {
            $_SESSION['logged_in_as_user'] = true;
            header("Location: user_login_success.php");
        } else {
            echo "Please enter correct information.<br>";
        }
    }
}

?>

<html lang="en">
<body>

<h2 align="center">
    user Login
</h2>

Please enter your login information.<br/><br/>

<form method="post" action="user_login_page.php">

    <b>Email:</b><br/>
    <label>
        <input type="email" name="user_email">
    </label><br/>

    <b>Password:</b><br/>
    <label>
        <input type="password" name="user_password">
    </label><br/>

    <label>
        <input type="submit" value="Login">
    </label><br/>

</form>

</body>
</html>