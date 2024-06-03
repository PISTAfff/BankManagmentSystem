<?php

// $dsn = $_ENV["DSN"];
// $dbusername = $_ENV["DBUSERNAME"];
// $dbpassword = $_ENV["DBPSWD"];

$dsn = "mysql:host=sql8.freemysqlhosting.netport=3306;dbname=sql8711485";
$dbusername = "sql8711485";
$dbpassword = "rbPhrsUKTn";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["message" => "Connection Failed: " . $e->getMessage()]);
    exit;
} ?>