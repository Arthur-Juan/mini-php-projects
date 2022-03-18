<?php

namespace App\Utils;


use Throwable;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;


require_once __DIR__."/../../bootstrap.php";
class View
{

    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__."/../../views");
        $this->twig =  new Environment($this->loader);
    }

    /**
     * @throws Throwable
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render($file, $params = []){
        $view = $file.".html";
        $template = $this->twig->load($view);

        if(empty($params)){
            echo $template->renderBlock('content');
            return;
        }
        echo $template->renderBlock('content', $params);
    }

}