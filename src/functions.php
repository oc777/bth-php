<?php
// Include the configuration file
require "./config.php";

// Open the database file and catch the exception if it fails.
function connectToDB($dsn)
{
    $db = null;

    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "<p>db connected</p>";
    } catch (PDOException $e) {
        echo "<p>Failed to connect to the database using DSN:<br>$dsn<br></p>";
        throw $e;
    }

    return $db;
}

function getArticle($db, $article) {
    $sql = "SELECT title,data FROM article WHERE name='$article'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}