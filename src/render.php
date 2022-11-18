<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Twig\Environment;
use Twig\Extra\Markdown\MarkdownExtension;
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$twig->addExtension(new MarkdownExtension());

$twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
    public function load($class): MarkdownRuntime
    {
        if (MarkdownRuntime::class === $class) {
            return new MarkdownRuntime(new DefaultMarkdown());
        }
    }
});

$r = $twig->render('index.html.twig');

echo $r;

file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'www/index.html', $r);
