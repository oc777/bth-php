<?php 
    $title = "Hem";
    include("incl/header.php"); 
?>

<main class="index">
<?php 
$article = "start";
$html = getArticle($db, $article);
echo $html["data"];
?>
</main>

<?php 
    include("incl/footer.php"); 
?>
