<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT email FROM user WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);
    $useri = mysqli_fetch_assoc($result);
    $email_poslodavca = $useri['email'];

    $query = "DELETE FROM poslovi WHERE email_poslodavca = '$email_poslodavca'";
    $result = mysqli_query($mysqli, $query);

    $query = "DELETE FROM user WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: ../adminpanel.php?success=2");
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
