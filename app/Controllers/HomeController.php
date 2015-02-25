<?php namespace App\Controllers;


use Core\BaseClasses\View;

class HomeController {

    public function home() {
        return View::render('home');
    }
    /*
     * Get all friends status from db
     * Add them to an array
     * send to VAD?
     */
    public function getStatusFeed() {

        return View::render('users/show', compact('status'));
    }

    public function sessionUser() {

    }

    public function getStatusForm() {

    }

}