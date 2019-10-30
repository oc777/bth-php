<h1>Källor</h1>
<?php 
$article = "kallor";
$html = getArticle($db, $article);
$htmlArray = explode("</div>", $html["data"]);
echo $htmlArray[4];
?>
