<!DOCTYPE html>
<html lang="en">

<head>

    <title>
    BazaGO
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <h1>
        <img src="Images/BazaGO logo.png" width="100" height="117" style="margin-left:15px">
        Welcome to BazaGO
    </h1>

    <button type="button" class="btn btn-outline-warning" style="float:right" >
        <a href="admin_login_page.php">Admin Login</a>
    </button>

    <button type="button" class="btn btn-outline-info" style="float:right" >
        <a href="user_login_page.php">User Login</a>
    </button>

</head>

<body>

<?php

require_once 'config.php';

$asking_for_items = "SELECT DISTINCT item_name FROM availability";

$result_of_item_name = $connection_to_mysql->query($asking_for_items);

if ($result_of_item_name) {
    while ($row = $result_of_item_name->fetch_assoc()) {

        $item_name_showing = $row['item_name'];

        /*$asking_for_best_price = "select price, shop_id from avialability where item_name = " . $item_name_showing . " order by price";
        $result_of_best_price = $connection_to_mysql->query($asking_for_best_price);
        $row_of_price = $result_of_best_price->fetch_assoc();*/

        echo "<button>". $item_name_showing;
        /*echo "Best price: " . $row_of_price['price'] . " at Shop ID: " . $row_of_price['shop_id'];*/
    }
}

?>

</body>
</html>