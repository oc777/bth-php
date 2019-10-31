<h1>Källor</h1>
<?php 
$name = "kallor";
$article = getArticle($dbObj, "article", $name);
$htmlArray = explode("</div>", $article[0]["data"]);
echo $htmlArray[0] . "</div>";
?>
