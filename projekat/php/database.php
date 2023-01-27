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

function getData($table, $col, $value)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM $table WHERE $col = ?");
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    return $data;
}

function getAllDataByQuery($query)
{
    global $mysqli;
    $data = array();
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        echo "Error fetching data: " . mysqli_error($mysqli);
        return $data;
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}


$con = $mysqli;
