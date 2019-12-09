<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "bazago";

$connection_to_mysql = mysqli_connect($server_name, $user_name, $password, $database_name);
$conn = $connection_to_mysql;