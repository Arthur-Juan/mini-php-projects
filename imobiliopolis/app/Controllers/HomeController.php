<?php

namespace App\Controllers;

use App\Utils\View;
use Throwable;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{
    private View $view;

    public function __construct(){
        $this->view = new View();
    }

    /**
     * @throws SyntaxError
     * @throws Throwable
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function index(){
        $products = [
            [
                'name'          => 'Notebook',
                'description'   => 'Core i7',
                'value'         =>  800.00,
                'date_register' => '2017-06-22',
            ],
            [
                'name'          => 'Mouse',
                'description'   => 'Razer',
                'value'         =>  125.00,
                'date_register' => '2017-10-25',
            ],
            [
                'name'          => 'Keyboard',
                'description'   => 'Mechanical Keyboard',
                'value'         =>  250.00,
                'date_register' => '2017-06-23',
            ],
        ];

        $this->view->render('home',['products'=>$products]);

    }


}