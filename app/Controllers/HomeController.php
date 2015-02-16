<?php namespace App\Controllers;


use Core\BaseClasses\View;

class HomeController {

    public function home() {
        return View::render('home');
    }

}