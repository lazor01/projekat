<?php

include_once("database.php");


$ime = $_REQUEST["ime"];
$prezime = $_REQUEST["prezime"];
$email = $_REQUEST["email"];
$role = $_REQUEST["role"];

$password = $_REQUEST["password"];
$passwordre = $_REQUEST["passwordre"];

if ($password != $passwordre) {
    die(header("Location: ../register_form.php?error=1"));
}


$query = $mysqli->query("SELECT * FROM user WHERE email='$email';");
$num = $query->num_rows;

if ($num > 0) {
    die(header("Location: ../register_form.php?error=2"));
}


$statement = $mysqli->prepare("INSERT INTO user(ime,prezime,email,password,role) VALUES (?, ?, ?, ? ,?);");
$statement->bind_param('sssss', $ime, $prezime, $email, md5($password), $role);

if ($statement->execute()) {
    header("Location: ../index.php?success=1");
} else {
    die('Error: (' . $mysqli->error . ')' . $mysqli->error);
}
