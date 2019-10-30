<?php
// Get what subpage to show, defaults to index
$pageReference = $_GET["page"] ?? "index";

// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$pages = [
    "index" => [
        "nav" => "Tryckta källor",
        "title" => "Litteratur och tryckta källor",
        "file" => __DIR__ . "/$base/index.php",
    ],
    "other" => [
        "nav" => "Otryckta källor",
        "title" => "Otryckta källor",
        "file" => __DIR__ . "/$base/other.php",
    ],
    "film" => [
        "nav" => "Film",
        "title" => "Film",
        "file" => __DIR__ . "/$base/film.php",
    ],
    "museums" => [
        "nav" => "Museer/vägar",
        "title" => "Museer/vägar",
        "file" => __DIR__ . "/$base/museums.php",
    ],
    "nostalgi" => [
        "nav" => "Nostalgimackar",
        "title" => "Nostalgimackar",
        "file" => __DIR__ . "/$base/nostalgi.php",
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
