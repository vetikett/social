<?php namespace App\Controllers;

use Core\BaseClasses\View;

class UsersController {

    public function indexAction() {
        return "Get all entities";
    }

    public function createAction() {
        return View::render('users/create');
    }

    public function saveAction() {
        return "Saves entity";
    }

    public function showAction($id) {


        return View::render('users/show', $id);
    }

    public function editAction($id) {
        return "Renders form to update entity with id: ". $id;
    }

    public function updateAction($id) {
        return "Updates entity with id: ". $id;
    }

    public function deleteAction($id) {
        return "Deletes entity with id: ". $id;
    }

}