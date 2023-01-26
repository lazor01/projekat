<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "projekat";

$mysqli = new mysqli($host, $user, $password, $dbname, "3306");

if ($mysqli->connect_error) {
    die('Error : (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
}

function getAllData($table)
{
    global $mysqli;
    $query = "SELECT * FROM " . $table;
    $result = $mysqli->query($query);
    if ($result) {
        return $result;
    } else {
        die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
    }
}

$con = $mysqli;
