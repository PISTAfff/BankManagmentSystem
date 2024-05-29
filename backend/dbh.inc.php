<?php

$dsn = "mysql:host=localhost;port=3306;dbname=bankmanagmentsystem";
$dbusername = "root";
$dbpassword = "Pista123$?$";
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["message" => "Connection Failed: " . $e->getMessage()]);
    exit;
} ?>