<?php
error_reporting(E_ALL);
$db_driver = "mysql";
$host = "localhost";
$database = "itechemployeework";
$dsn = "$db_driver:host=$host;dbname=$database";
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
?>