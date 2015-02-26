<?php namespace App\Controllers;


use Core\BaseClasses\View;

class HomeController {

    public function home() {
        return View::render('start');
    }
    /*
     * Get all friends status from db
     * Add them to an array
     * send to VAD?
     */
    public function getStatusFeed() {

        return View::render('user/show', compact('status'));
    }

    public function sessionUser() {

    }

    public function getStatusForm() {

    }

}