<?php
// Include common settings
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";

$db = connectToDB($dsnObj);

// get search query
$query = isset($_GET['search'])
? htmlspecialchars($_GET['search'])
: null;

$urlSrc = $_SERVER['HTTP_REFERER'];
$urlObj = "roads.php?road=";

if (!is_null($query)) {
    $res = search($db, $query);
    //var_dump($res);
    if (!is_null($res)) {
        //$urlObj .= $res;
        var_dump($urlObj);
        $_SESSION['search_objs'] = $res;
        header("Location: ./roads.php");
    } else {
        // echo "no matches";
        addFlashMsg("Din sökning gav inget resultat", "error");
        header("Location: " . $urlSrc);
    }
}
