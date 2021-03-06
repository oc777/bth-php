<?php
// Report all type of errors
error_reporting(-1);
// Display all errors
ini_set("display_errors", 1);

// Start the named session,
// the name is based on the path to this file.
$name = preg_replace("/[^a-z\d]/i", "", __DIR__);
if (!isset($_SESSION)) {
    session_name($name);
    session_start();
}

// Create a DSN for db
$dbFileName = __DIR__ . "/db/nvm.sqlite";
$dsn = "sqlite:$dbFileName";

// Create a DSN for objects db
$dbObjFileName = __DIR__ . "/db/nvm2.sqlite";
$dsnObj = "sqlite:$dbObjFileName";
