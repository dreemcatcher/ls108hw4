<?php
//session_start();
define('_HOST_NAME_', 'localhost');
define('_USER_NAME_', 'dreamcatcher');
define('_DB_PASSWORD', 'qzgaAuD3RKDhjc8w');
define('_DATABASE_NAME_', 'dreamcatcher');

//PDO Database Connection
try {
    $databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>