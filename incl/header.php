<?php
include "./config.php";
include "./src/functions.php";
?>

<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
    <title><?= $title ?> | NVM</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel='shortcut icon' href='img/emoji.png'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="page">
        <div class="page-wrap">
            <header class="site-header">
                <a href="index.php"><img src="pics/logo.png" alt="logo" /></a>
                <div class="search">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Sök..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </header>

            <nav class="navbar">
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "index.php" ? "selected" : ""; ?> icon" href="index.php"><i class="fa fa-home"></i></a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "about.php") !== false ? "selected" : ""; ?>" href="about.php?page=index">Om NVM</a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "roads.php") !== false ? "selected" : ""; ?>" href="roads.php?page=index">Vägmiljöer</a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "gallery.php") !== false ? "selected" : ""; ?>" href="gallery.php?page=index">Bilder</a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "resources.php") !== false ? "selected" : ""; ?>" href="resources.php?page=index">Källor</a>
                <a class="<?= strpos(basename($_SERVER['REQUEST_URI']), "contact.php") !== false ? "selected" : ""; ?>" href="contact.php?page=index">Kontakt</a>
                <a class="<?= basename($_SERVER['REQUEST_URI']) == "login.php" ? "selected" : ""; ?> icon" href="login.php"><i class="fa fa-sign-in"></i></a>
            </nav>