<?php
include "Repository/DatabaseConnector.php";

// Connect to the database
$databaseConnector = new DatabaseConnector();
$database = $databaseConnector->connectToDb();

// Execute the query
$query = $database->query("SELECT id, message, message_nl, device_id, update_method_id, priority, marquee FROM server_message WHERE enabled = TRUE");

// Return the output as JSON
header('Content-type: application/json');
echo (json_encode($query->fetchAll(PDO::FETCH_ASSOC)));

// Disconnect from the database
$database = null;
