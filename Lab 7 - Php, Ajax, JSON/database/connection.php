<?php

function OpenConnection(): mysqli
{
    $server = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "cars_database";

    $con = mysqli_connect($server, $user, $password, $database);

    if (!$con) {
        die('Could not connect to DB: ' . mysqli_connect_error());
    }

    return $con;
}

function CloseConnection(mysqli $con)
{
    $con->close();
}

// Test the connection
$con = OpenConnection();
if ($con) {
    echo "Database is connected successfully.";
    CloseConnection($con);
}
?>
