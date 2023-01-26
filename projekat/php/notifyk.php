<?php
// Connect to the database
require 'database.php';
session_start();

if (!isset($_SESSION['email'])) {
    die(header("Location: ../index.php?error=2"));
}

// Get the job ID from the form or query string
$id = $_GET['id']; // assuming the ID is passed via GET

// Get the email of the employer corresponding to the job ID
$sql = "SELECT email_radnika FROM radnici WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$poslovi = $result->fetch_assoc();
$za_email = $poslovi['email_radnika'];

// Get the data from the session
$od_email = $_SESSION['email'];
$opis = "Poslodavac salje ponudu";

// Prepare the SQL statement
$sql = "INSERT INTO notifikacije (od_email, za_email, opis) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);

// Bind the data to the statement
$stmt->bind_param("sss", $od_email, $za_email, $opis);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../indexposlodavac.php?success=3");
} else {
    header("Location: ../indexposlodavac.php?error=1");
}

// Close the statement and connection
$stmt->close();
$con->close();
