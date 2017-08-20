<?php
/*
This is Database connection
*/
include_once("configure.inc.php");
    try {
        //  Database information
        $dbUser = '';
        $dbPass = '';
        $dbHost = 'localhost';
        $dbName = '';
        $dsn = 'mysql:host=' . $dbHost . '; dbname=' . $dbName . '; charset=utf8mb4';
        $dbConn = new PDO($dsn, $dbUser, $dbPass);
    } catch (PDOException $e) {
        //  Display error
        echo 'Database connection error'.$e;
        exit;
    }
?>
