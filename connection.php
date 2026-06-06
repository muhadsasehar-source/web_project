<?php
require 'vendor/autoload.php'; 

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->numa_db; // Database ka naam yahan likha hai
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>