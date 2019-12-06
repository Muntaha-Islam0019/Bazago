<!DOCTYPE html>

<?

require_once 'config.php';

session_start();

if (isset($_POST['user_pushed_item_name'])) {

    $user_pushed_item_name = $_POST['user_pushed_item_name'];
    $user_pushed_item_name = $_POST['user_pushed_item_price'];

    $checking_name = "select * from item where item_name like '%" . $user_pushed_item_name . "%'";
    $result = $connection_to_mysql->query($checking_name);

    if (isset($_POST['user_pushed_item_name']) && isset($_POST['user_pushed_item_price'])) {
        if ($result->num_rows > 0) {

            echo "Your response has been recorded.<br>";

            $sql_to_update = "insert into user_requests values ('" . $_SESSION['user_id'] . "', '" . $_SESSION['item_name'] . "', 0, date('Y-m-d'))";
            $request_to_user_requests = $connection_to_mysql->query($sql_to_update);

        } else {
            echo "Please enter correct information.<br>";
        }
    }
}

?>

<html lang="en">
<body>

<h3 align="center">
Request for change in price
</h3>

<form method="post" action="user_request.php">

    <b>Full Item Name:</b><br/>
    <label>
        <input type="text" name="user_pushed_item_name">
    </label><br/>

    <b>New Price:</b><br/>
    <label>
        <input type="text" name="user_pushed_item_price">
    </label><br/>

    <label>
        <input type="submit" value="Submit">
    </label><br/>

</form>

</body>
</html>