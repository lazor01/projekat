<?php
require_once 'database.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $query = "SELECT ime FROM user WHERE email = '$email'";
    $result = mysqli_query($mysqli, $query);
    $user = mysqli_fetch_assoc($result);
    $ime = $user['ime'];
    $password = $ime . '123';

    $query = "UPDATE user SET password = MD5('$password') WHERE email = '$email'";
    $result = mysqli_query($mysqli, $query);
    if ($result) {
        header("Location: ../adminpanel.php?success=4");
    } else {
        echo "Error updating password: " . mysqli_error($mysqli);
    }
}
