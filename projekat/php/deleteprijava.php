<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM notifikacije WHERE prijava_id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: ../prijave.php?success=1");
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
