<?php 
$title = "Vägmiljöer";
include("incl/header.php");

// get list of objects from session (search) or db
$roadObjects = (isset($_SESSION["search_objs"]))
? $_SESSION["search_objs"]
: getObjects($dbObj);

// get road title to show only one road
$road = isset($_GET['road'])
? $_GET['road']
: null;

// get the view option to display objects
$view = isset($_GET['view'])
? $_GET['view']
: "compact";

// pagination in single road view
$roadNext = null;
$roadPrev = null;
$i = null;
if (isset($road)) {
    $i = array_search($road, array_column($roadObjects, 'name'));
    $roadPrev = ($i > 0) ? $roadObjects[$i - 1]['name'] : null;
    $roadNext = ($i < count($roadObjects) - 1) ? $roadObjects[$i + 1]['name'] : null;

    // echo 'index in arr: ' . $i . PHP_EOL;
    // echo 'prev: ' . $roadPrev . PHP_EOL;
    // echo 'next: ' . $roadNext . PHP_EOL;
}

// remove search results from session
if (isset($_SESSION["search_objs"])) {
    unset($_SESSION["search_objs"]);
}

?>

<?php if (!isset($road)) : ?>
<main class="roads">
<h1>Vägmiljöer</h1>

    <?php if ($view == "compact") : ?>

<div class="view-opt">
    <a href="?view=extended">Utökad vy</a>
</div>

<div class="objects compact">

        <?php 
        foreach ($roadObjects as $obj) {
            $img = getFirstImage($dbObj, "object", $obj['name']);
            $src = $img['image1'];
            $alt = $img['image1Alt'];
            echo '
    <div class="obj">
        <a href="?road=' . $obj['name'] . '">
            <div>
                <img src="img/250/' . $src .'" alt="' . $alt . '"/>
            </div>
            <h3>' . $obj['title'] . '</h3>
        </a>
    </div>
    ';
        }

        ?>

</div>


    <?php elseif ($view == "extended") : ?>

<div class="view-opt">
    <a href="?view=compact">Kompakt vy</a>
</div>


<div class="objects extended">

        <?php
        foreach ($roadObjects as $obj) {
            $img = getFirstImage($dbObj, "object", $obj['name']);
            $src = $img['image1'];
            $alt = $img['image1Alt'];
            $text = substr(ltrim($obj['data']), 0, 325);
            echo '
    <div class="obj">
        <div class="img">
            <img src="img/500/' . $src .'" alt="' . $alt . '"/>
        </div>
        <div>
            <div>' . $text . ' ...</div>
            <div><a href="?road=' . $obj['name'] . '">Läs mer <i class="fa fa-angle-double-right"></i></a></div>
        </div>
    </div>
    ';
        }
        ?>

</div>

    <?php endif; ?>


</main>

<?php else : ?>

<main class="roads-obj">

<div class="pagination flex">
    <span>
    <?php if (isset($roadPrev)) {
        echo '<a href="?road=' . $roadPrev . '"><i class="fa fa-angle-left"></i> Föregående</a>';
    }?>
    </span>
    <span><a href="roads.php">Visa alla</a></span>
    <span>
    <?php if (isset($roadNext)) {
        echo '<a href="?road=' . $roadNext . '">Nästa <i class="fa fa-angle-right"></i></a>';
    }?>
    </span>
</div>


    <?php
    // $road = getOneObject($db, $road);
    // echo $road;

    $img1 = getFirstImage($dbObj, "object", $road);
    renderImage($img1, 1);

    echo $roadObjects[$i]['data'];

    $img2 = getSecondImage($dbObj, "object", $road);
    if (!is_null($img2['image2'])) {
        renderImage($img2, 2);
    }
    ?>

</main>

<?php endif; ?>



<?php 
    include("incl/footer.php"); 
?>
