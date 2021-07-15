<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$r = $twig->render('index.html.twig', ['name' => 'Fabien']);

echo $r;

file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'www/index.html', $r);
