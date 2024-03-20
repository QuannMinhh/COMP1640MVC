<?php
$host = 'localhost';
$dbname = 'comp1640';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB connection successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
