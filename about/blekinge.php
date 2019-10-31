<?php
$name = "blekinges-vaghistoria";
$article = getArticle($dbObj, "article", $name);
$img = getFirstImage($dbObj, "article", $name);

echo '<h1>' . $article[0]['title'] . '</h1>';

if (!is_null($img['image1'])) {
    renderImage($img, 1);
}

echo $article[0]['data'];
