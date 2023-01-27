<?php
include 'database.php';

// Get the values from the form
$ime_posla = $_POST['ime_posla'];
$poslodavac = $_POST['poslodavac'];
$oblast_rada = $_POST['oblast_rada'];
$grad = $_POST['grad'];
$opis = $_POST['opis'];
$id = $_POST['id'];

// Create the update query
$query = "UPDATE poslovi SET ime_posla='$ime_posla', poslodavac='$poslodavac', oblast_rada='$oblast_rada', grad='$grad', opis='$opis' WHERE id='$id'";

// Execute the query
if (mysqli_query($mysqli, $query)) {
    header("Location: ../oglasi.php?success=5");
} else {
    echo "Error updating record: " . mysqli_error($mysqli);
}

// Close the connection
mysqli_close($mysqli);
