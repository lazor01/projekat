<?php

include_once("database.php");
session_start();

$email = stripcslashes($_REQUEST["email"]);
$password = stripcslashes($_REQUEST["password"]);
$md_5 = md5($password);

$queryZaAdmina = $mysqli->query("SELECT * FROM administrator WHERE email='$email' AND password ='$md_5'");

$query = $mysqli->query("SELECT * FROM user WHERE email='$email' AND password='$md_5' ");

if ($queryZaAdmina->num_rows == 1) {

    $data = $queryZaAdmina->fetch_object();
    $_SESSION["username"] = $data->username;
    $_SESSION["email"] = $data->email;
    $_SESSION["role"] = $data->role;

    header("Location: ../adminpanel.php");
} else

if ($query->num_rows == 1) {
    $data = $query->fetch_object();
    $_SESSION["id"] = $data->id;
    $_SESSION["ime"] = $data->ime;
    $_SESSION["prezime"] = $data->prezime;
    $_SESSION["email"] = $data->email;
    $_SESSION["role"] = $data->role;

    if ($_SESSION["role"] == 'Korisnik') {
        header("Location: ../indexlog.php?success=1");
    } else if ($_SESSION["role"] == 'Poslodavac') {
        header("Location: ../indexposlodavac.php?success=1");
    } else {
        die(header("Location: ../index.php?error=1"));
    }
}
