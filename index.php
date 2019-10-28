<?php 
    $title = "Hem";
    include("incl/header.php"); 

    $article = "start";
    $html = getArticle($db, $article);
?>

    <main>
        <?php echo $html; ?>

    </main>

<?php 
    include("incl/footer.php"); 
?>
