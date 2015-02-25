<?php namespace App\Controllers;

use App\Db;
use PDO;
use Core\BaseClasses\View;



class FriendsController {

    public function showFriendsAction($id) {

        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM friends WHERE (requester_id = :id OR respondent_id = :id) AND status = 'accepted'");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();

        $friends = $stm->fetchAll(PDO::FETCH_OBJ);

        return View::render('friends/index', compact('friends'));

    }

    function addFriendAction() {
        $user_id = $_POST['user_id'];
        $friend_id = $_POST['friend_id'];
        $db = Db::get();
        $stm = $db->prepare("INSERT INTO friends (requester_id, respondent_id, status) VALUES ($user_id, $friend_id, 'pending') ");

        if($stm->execute()) {
            echo "friend added" ;
        } else {
            echo "something went wrong... User id = " . $user_id . " friend id = " . $friend_id ;
        }
    }

    function saveFriendAction() {

    }

    function deleteFriendAction() {
        $user_id = $_POST['user_id'];
        $friend_id = $_POST['friend_id'];

        $db = Db::get();
        $stm = $db->prepare("DELETE FROM friends WHERE requester_id = '$user_id' AND respondent_id = '$friend_id' ");

        if($stm->execute()) {
            echo "friend deleted" ;
        } else {
            echo "something went wrong... User id = " . $user_id . " friend id = " . $friend_id ;
        }
    }

    function showFriendRequestAction() {
        $db = Db::get();
    }

    function respondToFriendRequestAction() {

    }

}