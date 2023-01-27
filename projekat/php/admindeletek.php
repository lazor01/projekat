<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT email_radnika FROM radnici WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);
    $radnici = mysqli_fetch_assoc($result);
    $email_radnika = $radnici['email_radnika'];

    $query = "DELETE FROM radnici WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    $query = "DELETE FROM user WHERE email = '$email_radnika'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: ../adminpanel.php?success=1");
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
