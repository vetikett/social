<?php namespace App\Controllers;

use App\Db;
use PDO;
use Core\BaseClasses\View;

class UsersController {

    // indexAction method will be triggered at
    // both example.com/users/index AND example.com/users
    // this convention is true for all controllers. So if you want
    // an action for example "example.com/posts" just name is "indexAction".

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
        $db = Db::get();
        $stm = $db->prepare('SELECT * FROM users
                           WHERE users.id = :id');
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();

        $user = $stm->fetchObject();
       
        return View::render('users/show', compact('user'));

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