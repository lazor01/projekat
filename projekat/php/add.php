<?php

require_once 'database.php';
session_start();

// check if user is logged in and if the role is Korisnik
if (!isset($_SESSION['ime']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'Korisnik') {
    die('Unauthorized access');
}

// Get the data from the form
$ime = $_SESSION['ime'];
$prezime = $_SESSION['prezime'];
$email = $_SESSION['email'];
$struka = $_POST['struka'];
$datum_rodjenja = $_POST['datum_rodjenja'];
$mesto_rodjenja = $_POST['mesto_rodjenja'];
$cv = $_FILES['cv']['tmp_name'];

$cv = addslashes(file_get_contents($cv));

// Insert the data into the radnici table
$query = "INSERT INTO radnici (ime_radnika, prezime_radnika, email_radnika, struka, datum_rodjenja, mesto_rodjenja, cv) VALUES ('$ime', '$prezime', '$email', '$struka', '$datum_rodjenja', '$mesto_rodjenja', '$cv')";
$result = $mysqli->query($query);

if (!$result) {
    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
} else {
    header("Location: ../indexlog.php?success=4");
}
