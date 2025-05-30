<?php
// db.php - Database connection
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->student_db->students;
?>

