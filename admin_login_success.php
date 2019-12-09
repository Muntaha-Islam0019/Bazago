<!DOCTYPE html>
<html>
<body>

<?php

require 'config.php';

session_start();

echo "
<b>Hello " . $_SESSION['admin_name'] . "</b>!<br>
You've successfully logged in.
";

if (!isset($_SESSION['logged_in_as_admin']) || $_SESSION['logged_in_as_admin'] == false) {
    header("Location: admin_login_page.php");
}

if(isset($_POST['admin_id']) && isset($_POST['shop_id']) && isset($_POST['new_price']) && isset($_POST['item_name'])) {

    $new_price = $_POST['new_price'];
    $shop_id = $_POST['shop_id'];
    $admin_id = $_POST['admin_id'];
    $item_name = $_POST['item_name'];

    $query_of_change = "UPDATE availability SET price = " . $new_price . ' WHERE shop_id = "' . $shop_id . '" AND item_name = "' . $item_name . '"';
    $result_of_change = $conn->query($query_of_change);
}

?>

<h5>
    Change item info:
</h5>

<form method="post" action="admin_login_success.php">

    <b>Admin ID:</b><br/>
    <label>
        <input type="text" name="admin_id">
    </label><br/>

    <b>Item Name:</b><br/>
    <label>
        <input type="text" name="item_name">
    </label><br/>

    <b>Shop ID:</b><br/>
    <label>
        <input type="text" name="shop_id">
    </label><br/>

    <b>New Price:</b><br/>
    <label>
        <input type="text" name="new_price">
    </label><br/>

    <label>
        <input type="submit" value="Change">
    </label><br/>

</form>

</body>
</html>