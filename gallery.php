<?php 
$title = "Bilder";
include("incl/header.php");

$img = isset($_GET['img'])
? $_GET['img']
: null;

$page = isset($_GET['page'])
? $_GET['page']
: 1;

$itemsPerPage = 12;
$index = $page * $itemsPerPage - $itemsPerPage;

$files = glob("img/250/*.*");
$pages = ceil(count($files)/$itemsPerPage);
?>

<main class="gallery">
<h1>Bilder</h1>

<?php if ($img): ?>

<p><a href="gallery.php">Visa alla bilder</a></p>
<div class="img-show">
    <img src="img/800/<?= $img ?>" alt="full size" />
</div>
<p><?= $img ?></p>

<?php else: ?>

<p class="pagination">

<?php if($page != 1): ?>
<a href="?page=<?= $page - 1 ?>"><i class="fa fa-angle-left"></i> Föregående</a>
<?php endif; ?>

<?php if($page != $pages): ?>
<a href="?page=<?= $page + 1 ?>">Nästa <i class="fa fa-angle-right"></i></a>
<?php endif; ?>

</p>

<div class="flex">

<?php 
for ($i = $index; $i < $index + $itemsPerPage; $i++) {
    if (!array_key_exists($i, $files)) {
        break;
    }
    $image = $files[$i];
    $alt = preg_replace("/^[0-9_]*/" ,"" , str_replace(".jpg", "", basename($image)));
    echo 
    '<div class="item">
    <a href="?img=' . basename($image) . '">
    <img src="' . $image . '" alt="' . $alt . '" />
    </a>
    </div>';

}
?>
</div>

<?php endif; ?>

</main>

<?php 
    include("incl/footer.php"); 
?>
