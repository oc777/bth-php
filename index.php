<?php 
    $title = "Hem";
    include("incl/header.php"); 
?>

<main class="index">
<?php 
$name = "start";
$article = getArticle($dbObj, "article", $name);

echo '<h1>' . $article[0]['title'] . '</h1>';

echo $article[0]['data'];
?>
</main>

<?php 
    include("incl/footer.php"); 
?>
