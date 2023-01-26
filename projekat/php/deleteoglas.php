<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM poslovi WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: ../oglasi.php");
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
