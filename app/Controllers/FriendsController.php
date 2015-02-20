<?php namespace App\Controllers;

use App\Db;
use PDO;
use Core\BaseClasses\View;



class FriendsController {

    public function indexAction() {
        $db = Db::get();
        $stm = $db->prepare('SELECT * FROM friends');
        $stm->execute();

        $friends = $stm->fetchAll(PDO::FETCH_OBJ);

        return View::render('friends/index', compact('friends'));

    }

    function addFriendAction() {

    }

    function saveFriendAction() {

    }

    function deleteFriendAction() {

    }

    function showFriendRequestAction() {

    }

    function respondToFriendRequestAction() {

    }

}