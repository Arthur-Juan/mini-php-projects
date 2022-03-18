<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

require_once __DIR__."/vendor/autoload.php";



$loader = new FilesystemLoader(__DIR__."/views");
$twig = new Environment($loader);