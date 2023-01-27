<?php
require_once 'database.php';
session_start();

$password = $_REQUEST["password"];
$passwordre = $_REQUEST["passwordre"];

if ($password != $passwordre) {
    die(header("Location: ../changepass.php?error=1"));
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT password FROM user WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);
    $user = mysqli_fetch_assoc($result);

    $password1 = md5($password);
    $query = "UPDATE user SET password = '$password1' WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        if ($_SESSION['role'] == 'Korisnik') {
            header("Location: ../indexlog.php?success=5");
        }
        if ($_SESSION['role'] == 'Poslodavac') {
            header("Location: ../indexposlodavac.php?success=5");
        }
    } else {
        echo "Error updating password: " . mysqli_error($mysqli);
    }
}
