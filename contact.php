<?php 
    $title = "Kontakt";
    include("incl/header.php"); 
?>

<main class="contact">
<?php 
$article = "kontakt";
$html = getArticle($db, $article);
echo $html["data"];
?>
</main>

<?php 
    include("incl/footer.php"); 
?>
