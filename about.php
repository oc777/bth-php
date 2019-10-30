<?php
// Get what subpage to show, defaults to index
$pageReference = $_GET["page"] ?? "index";

// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$pages = [
    "index" => [
        "nav" => "Nättraby Vägmuseum",
        "title" => "Om Nättraby Vägmuseum",
        "file" => __DIR__ . "/$base/index.php",
    ],
    "project" => [
        "nav" => "Om Projektet",
        "title" => "NVM Projekt",
        "file" => __DIR__ . "/$base/project.php",
    ],
    "blekinge" => [
        "nav" => "Blekinges väghistoria",
        "title" => "Blekinges väghistoria",
        "file" => __DIR__ . "/$base/blekinge.php",
    ],
    "sweden" => [
        "nav" => "Sveriges väghistoria",
        "title" => "Sveriges väghistoria",
        "file" => __DIR__ . "/$base/sweden.php",
    ],
    "opening" => [
        "nav" => "NVM Invigning",
        "title" => "NVM Invigning",
        "file" => __DIR__ . "/$base/opening.php",
    ],
    "web" => [
        "nav" => "NVM på Webben",
        "title" => "NVM Webbplats",
        "file" => __DIR__ . "/$base/web.php",
    ],
    "dev" => [
        "nav" => "Webb Utvecklare",
        "title" => "Om Utvecklare",
        "file" => __DIR__ . "/$base/dev.php",
    ],
];

$errorPages = [
    "404" => [
        "title" => "404",
        "file" => __DIR__ . "/$base/notfound.php",
    ],
];

// Get the current page from the $pages collection, if it matches
$page = $pages[$pageReference] ?? $errorPages["404"];

// Base title for all pages and add title from selected multipage
$title = $page["title"] ?? "404";

// Render the page
require __DIR__ . "/incl/header.php";
require __DIR__ . "/view/multipage.php";
require __DIR__ . "/incl/footer.php";
