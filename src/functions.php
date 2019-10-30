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

    } catch (PDOException $e) {
        echo "<p>Failed to connect to the database using DSN:<br>$dsn<br></p>";
        throw $e;
    }

    return $db;
}

function getArticle($db, $article)
{
    $sql = "SELECT data FROM article WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$article]);

    $res = $stmt->fetch();

    return $res;
}

function getObjects($db, $search = "%") 
{
    $sql = "SELECT name, title, data FROM object WHERE data LIKE ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$search]);

    $res = $stmt->fetchAll();

    return $res;
}

function getObjMainImage($db, $title)
{
    $sql = "SELECT image1, image1alt FROM object WHERE title = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$title]);

    $res = $stmt->fetchAll();

    return $res;
}

function getOneObject($db, $title)
{
    $sql = "SELECT data FROM article WHERE name = ?";
    $stmt = $db->prepare($sql);
    $params = [$title];
    $stmt->execute($params);
    $res = $stmt->fetchColumn();

    if (empty($res)) {
        return null;
    }

    return $res;
}

function search($db, $query)
{
    $sql = "SELECT name, title, data FROM object WHERE data LIKE ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(["%$query%"]);

    $res = $stmt->fetchAll();

    if (empty($res)) {
        return null;
    }

    return $res;
}

function addFlashMsg($msg, $type)
{
    $_SESSION["flash_msg"] = $msg;
    $_SESSION["flash_msg_type"] = $type;
}

function removeFlashMsg()
{
    unset($_SESSION["flash_msg"]);
    unset($_SESSION["flash_msg_type"]);
}
