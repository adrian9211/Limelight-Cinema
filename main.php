<?php
// Update the details below with your MySQL details
// Credentials below
// Subscribe and unsubscribe to the newsletter connection
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '1xCMat5k5Cb4';
$DATABASE_NAME = 'Limelight-Cinema';
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    // Output all connection errors. We want to know what went wrong...
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
}
?>