<?php
include "./config.php";
include "./src/functions.php";

$db = connectToDB($dsn);
$dbObj = connectToDB($dsnObj);

?>

<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
    <title><?= $title ?> | NVM</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel='shortcut icon' href="pics/nvm-icon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main-bg"></div>
    <div class="page">
        <div class="page-wrap">
            <header class="site-header">
                <a href="index.php"><img src="pics/logo.png" alt="logo" /></a>
                <div class="search">
                    <form action="search.php" method="GET" >
                        <input type="text" placeholder="Sök vägmiljöer..." name="search" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </header>

            <nav class="navbar">
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "index.php" ? "selected" : ""; ?> icon" href="index.php"><i class="fa fa-home"></i></a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "about.php") !== false ? "selected" : ""; ?>" href="about.php?page=index">Om NVM</a>
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "roads.php" ? "selected" : ""; ?>" href="roads.php">Vägmiljöer</a>
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "gallery.php" ? "selected" : ""; ?>" href="gallery.php">Bilder</a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "resources.php") !== false ? "selected" : ""; ?>" href="resources.php?page=index">Källor</a>
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "contact.php" ? "selected" : ""; ?>" href="contact.php">Kontakt</a>
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "login.php" ? "selected" : ""; ?> icon" href="#"><i class="fa fa-sign-in"></i></a>
            </nav>

<?php 
if (isset($_SESSION['flash_msg'])) {
    echo "<div class='flash-msg " . $_SESSION['flash_msg_type'] . "'>" . $_SESSION['flash_msg'] . "</div>";
    removeFlashMsg($_SESSION['flash_msg']);
}
?>
