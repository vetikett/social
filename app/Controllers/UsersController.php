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
        $db = Db::get();    // Db::get() is set short for the db connection
        $stm = $db->prepare('SELECT * FROM users
                           WHERE id = :id');
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

        // get variables
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['username'];
        $user_status = $_POST['user_status'];
        $img = $_POST['user_img'];


        // update database
        $db = Db::get();
        $stm = $db->prepare('UPDATE users SET username = :username, email = :email, password = :password, user_status = :user_status, user_img = :img WHERE id = :id ');
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':username', $username, PDO::PARAM_STR);
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->bindParam(':password', $password, PDO::PARAM_STR);
        $stm->bindParam(':user_status', $user_status, PDO::PARAM_STR);
        $stm->bindParam(':img', $img, PDO::PARAM_STR);

        // if able to update, send to userpage
        if($stm->execute) {
            echo "user updated" ;
        }

        // if not, tell what went wrong
        else {
            echo "something went wrong";
        }
    }

    public function deleteUserAction($id) {
        $db = Db::get();
        $stm = $db->prepare('DELETE * FROM users WHERE id= :id');
        $stm->bindParam(':id', $id, PDO::PARAM_INT );
        $stm->execute();
        return "Deletes entity with id: ". $id;
    }

    public function saveAction() {

    }

    public function updateStatusAction() {

    }
}