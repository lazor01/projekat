<?php

require_once './database.php';
$id = $_GET['id'];
$result = getData("radnici", "id", $id);
$cv = $result["cv"];
$ime_radnika = $result["ime_radnika"];
$prezime_radnika = $result["prezime_radnika"];
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="CV ' . $ime_radnika . ' ' . $prezime_radnika . '.pdf"');
echo $cv;
