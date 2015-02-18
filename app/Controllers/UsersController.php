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
        $db = Db::get();
        $stm = $db->prepare('SELECT * FROM users');
        $stm->execute();

        $users = $stm->fetchAll(PDO::FETCH_OBJ);

        return View::render('users/index', compact('users'));

    }

    public function showAction($id) {
        $db = Db::get();
        $stm = $db->prepare('SELECT * FROM users
                           WHERE users.id = :id');
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();

        if ($user = $stm->fetchObject()) {
            return View::render('users/show', compact('user'));
        } else {

            require_once '404.php';
        }



    }

    public function editAction($id) {
        $user['id'] = $id;
        return View::render('users/edit', compact('user'));
    }

    public function updateAction($id) {
        var_dump("Updates entity with id: ". $id);
    }

    public function deleteAction($id) {
        return "Deletes entity with id: ". $id;
    }

}