<?php
require_once 'database.php';
session_start();

$ime_posla = $_POST['ime_posla'];
$oblast_rada = $_POST['oblast_rada'];
$poslodavac = $_POST['poslodavac'];
$email = $_SESSION["email"];
$grad = $_POST['grad'];
$vreme_objave = date("Y-m-d");
$opis = $_POST['opis'];

$sql = "INSERT INTO poslovi (ime_posla, oblast_rada, poslodavac, email_poslodavca, grad, vreme_objave, opis)
VALUES ('$ime_posla', '$oblast_rada', '$poslodavac', '$email', '$grad', '$vreme_objave', '$opis')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: ../indexposlodavac.php?success=4");
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
