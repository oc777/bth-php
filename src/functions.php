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

// get list of objects that match a search query
// by default returns all objects
function getObjects($db, $query = "%") 
{
    $sql = "SELECT name, title, data FROM object WHERE data LIKE ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(["%$query%"]);

    $res = $stmt->fetchAll();

    return $res;
}

// get first img for article or object with its alt and text
function getFirstImage($db, $table, $name)
{
    $sql = "SELECT image1, image1alt, image1text FROM $table WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name]);

    $res = $stmt->fetch();

    return $res;
}

// get second img for article or object with its alt and text
function getSecondImage($db, $table, $name)
{
    $sql = "SELECT image2, image2alt, image2text FROM $table WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name]);

    $res = $stmt->fetch();

    if (empty($res)) {
        return null;
    }

    return $res;
}

// get data for article or object
function getArticle($db, $table, $name)
{
    $sql = "SELECT title, data FROM $table WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name]);

    $res = $stmt->fetchAll();

    return $res;
}

// add flash msg to session
// type: error / success
function addFlashMsg($msg, $type)
{
    $_SESSION["flash_msg"] = $msg;
    $_SESSION["flash_msg_type"] = $type;
}

// remove flash msg from session
// type: error / success
function removeFlashMsg()
{
    unset($_SESSION["flash_msg"]);
    unset($_SESSION["flash_msg_type"]);
}

// render img with alt and text description
function renderImage($img, $imgIndex)
{
    $src = $img['image' . $imgIndex];
    $alt = $img['image' . $imgIndex . 'Alt'];
    $txt = $img['image' . $imgIndex . 'Text'];
    $html = '
        <div class="flex">
            <p class="img-wrap">
                <img src="img/250/' . $src .'" alt="' . $alt . '"/>
            </p>
            <p>' . $txt . ' </p>
        </div>
    ';
    echo <<<EOD
$html
EOD;
}
