<?php

function getDatabaseConnection()
{
    $servername = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "cs_skin";

    $connect = mysqli_connect("$servername", "$dbuser", "$dbpass", "$dbname");

    if($connect->connect_error)
    {
    die("Error failed to connect to MySQL: " . $connect->connect_error);
    }

    return $connect;
}
?>
