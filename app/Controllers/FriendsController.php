<?php namespace App\Controllers;
require_once 'UsersController.php';

use App\Db;
use PDO;
use Core\BaseClasses\View;



class FriendsController {

    /*public function showFriendsAction($id) {
        $html = "";
        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM friends WHERE (requester_id = :id OR respondent_id = :id) AND status = 'accepted'");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if($stm->execute()) {
            while($row = $stm->fetch()) {
                $html .= "<div class='singlefriend'><div class='friend_img'><img class='friend_img' src='" . $row['user_img'] . "'></div><div class='friend_name'>
    <span class='up_sf_name'><a href='../users/show/" . $row['id'] . "'>" . $row['username'] . "></a></span>
    <img class='friendsmessimg' src='../../imgs/mess_icon_nohover.png' onmouseover='messh(this);' onmouseout='messoh(this);' alt='Skicka meddelande!' title='Skicka meddelande!'></div><div class='add_delete_friend'><i class='fa fa-plus-square fa-2x'></i></div></div>";
            }
            return $html;
        }

    } */

    public function getFriends($user_id) {
        $db = Db::get();

        $stm = $db->prepare("SELECT * FROM friends WHERE (requester_id = '$user_id' OR respondent_id = '$user_id') AND status = 'pending'");

        if ($stm->execute()) {
            foreach ( $stm as $friend ) {
                if ($user_id != $friend['requester_id']) {
                    $friend_ids[] = $friend['requester_id'];
                }
                elseif ($user_id != $friend['respondent_id']) {
                    $friend_ids[] = $friend['respondent_id'];
                }
                else {
                    echo "you ain't got no friends, buuuuuhuuuu";
                }
            }
        }
        else {
            echo "whatt";
        }
        return $friend_ids;
    }

    public function showFriends($friends_array) {
        $yada = new UsersController();
        foreach ( $friends_array as $friend_id ) {
            $userpals[] = $yada->getAllUsersAction($friend_id); // Hämtar från usercontrollern
        }
        foreach ( $userpals as $user ) {
            ?>
            <div class="singlefriend">
                <div class="friend_img">
                    <img class="friend_img" src="../../<?php echo $user[0]->user_img;?>">
                </div>
                <div class="friend_name">
                    <span class="up_sf_name"><a href="userpage.php?userid=<?php echo $user[0]->id;?>"><?php echo $user[0]->username;?></a></span>
                    <img class="friendsmessimg" src="../../imgs/mess_icon_nohover.png" onmouseover="messh(this);" onmouseout="messoh(this);" alt="Skicka meddelande!" title="Skicka meddelande!">
                </div>
                <div class="add_delete_friend"><i class="fa fa-plus-square fa-2x"></i></div>
            </div>
        <?php
        }
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

    function respondToFriendRequestAction() {

    }

    function showFriendRequestAction($id) {
        $html = "";
        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM friends WHERE respondent_id = :id AND status = 'pending' ");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if($stm->execute()) {
            while($row = $stm->fetch()) {
                $html .= "<h2><a href='../users/show/" . $row["id"] . "'>" . $row['username'] . "</a></h2>";
                $html .= "<form method='post' action='./addFriend'> <input type='submit' value='Accept Friendrequest' /> <input type='submit' value='Decline Friendrequest' /> </form> " ;
            }
            return View::render('friends/index', compact('html'));
        }
    }

    function declineFriendRequestAction() {
        $db = Db::get();
        $stm = $db->prepare("UPDATE friends SET status= 'declined' WHERE respondent_id = :user_id AND requester_id = :friend_id ");
        $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stm->bindParam(":friend_id", $friend_id, PDO::PARAM_INT);
    }

    function acceptFriendRequestAction() {
        $db = Db::get();
        $stm = $db->prepare("UPDATE friends SET status= 'accepted' WHERE respondent_id = :user_id AND requester_id = :friend_id ");
        $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stm->bindParam(":friend_id", $friend_id, PDO::PARAM_INT);
    }

}