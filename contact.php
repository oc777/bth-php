<?php 
    $title = "Kontakt";
    include("incl/header.php"); 
?>

<main class="contact">
<?php 
$article = "kontakt";
$html = getArticle($dbObj, "article", $article);
echo '<h1>' . $html[0]["title"] . '</h1>';
echo $html[0]["data"];
?>
</main>

<?php 
    include("incl/footer.php"); 
?>
