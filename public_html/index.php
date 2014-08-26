<?php

require "../src/autoload.php";
require "../src/formulario.php";

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

$file = (empty($_SERVER['REQUEST_URI']) ? 'home' : ltrim($_SERVER['REQUEST_URI'], '/')) . ".php";

if(file_exists($file)) {
    include $file;
    exit;
}

include "home.php";