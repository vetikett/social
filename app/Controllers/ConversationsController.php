<?php namespace App\Controllers;
require_once('resources/views/header.php');

require_once 'UserController.php';

use App\Db;
use PDO;
use Core\BaseClasses\View;

class ConversationsController {

    public function indexAction() {
        $user = $_SESSION['user'];
        $userid = $user->id;

        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM conversations WHERE user_1 = :id OR user_2 = :id");
        $stm->bindParam(':id', $userid, PDO::PARAM_INT);

        if ($stm->execute()) {
            $conversations = $stm->fetchAll(PDO::FETCH_OBJ);
            return View::render('conversations/index', compact('conversations'));
        }
        else {
            require_once '404.php';
        }
    }

    public function getMessageList($user_id) {
        $db = Db::get();

        $stm = $db->prepare("SELECT * FROM conversations WHERE conversations.user_1 = :id OR conversations.user_2 = :id");
        $stm->bindParam(':id', $user_id, PDO::PARAM_INT);

        if ($stm->execute()) {
            foreach ( $stm as $convers ) {
                if (($user_id = $convers['user_1']) || ($user_id = $convers['user_2'])) {
                    $conversation_ids[] = $convers;
                }
                else {
                    echo "No messages yet, buddyboy";
                }
            }
        }
        else {
            echo "what";
        }

        $yada = new UserController();
        $counter=0;
        foreach ($conversation_ids as $conid) {
            if ($_SESSION['user']->id != $conid['user_1']) {
                $userarray[] = $yada->getAllUsersAction($conid['user_1']); // Hämtar från usercontrollern
                ?>
                <a href="http://localhost/social/conversations/readConversation/<?php echo $conid['id'];?>">
                    <div class="sfl" onmouseover="hover(this);" onmouseout="unhover(this);">
                        <img class="userimg" src="http://localhost/social/<?php echo $userarray[$counter][0]->user_img;?>">
                        <div class="sfl_info">
                            <span class="sf_user"><?php echo $userarray[0][$counter]->username;?></span>
                        </div>
                    </div></a>
                <?php
            }
            if ($_SESSION['user']->id != $conid['user_2']) {
                $userarray[] = $yada->getAllUsersAction($conid['user_2']); // Hämtar från usercontrollern
                ?>
                <a href="http://localhost/social/conversations/readConversation/<?php echo $conid['id'];?>">
                    <div class="sfl" onmouseover="hover(this);" onmouseout="unhover(this);">
                        <img class="userimg" src="http://localhost/social/<?php echo $userarray[$counter][0]->user_img;?>">
                        <div class="sfl_info">
                             <span class="sf_user"><?php echo $userarray[$counter][0]->username;?></span>
                        </div>
                    </div></a>
            <?php
            }
            $counter++;
        }

    }

    public function readConversationAction($conversationid) {
        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM messages INNER JOIN conversations ON messages.conversation_id = conversations.id
INNER JOIN users ON (conversations.user_1 = users.id OR conversations.user_2 = users.id) WHERE conversation_id = :conversationid GROUP BY messages.id ORDER BY messages.created_at DESC");
        $stm->bindParam(':conversationid', $conversationid, PDO::PARAM_INT);
        if ($stm->execute()) {
            return View::render('conversations/index', compact('stm'));
        }
        else {
            echo "ss";
        }
    }

    public function createConversationAction() {
        $db = Db::get();
        $stm = $db->prepare("INSERT INTO * FROM messages ");
        $stm->bindParam(':conversationid', $conversationid, PDO::PARAM_INT);
    }

    public function saveConversationAction() {

    }

    public function sendMessageAction($conversationid) {
        $db = Db::get();
        session_start();
        $message = $_POST['message'];
        $inlogged_user = $_SESSION['user'];
        $userid = $inlogged_user->id;

        $stm = $db->prepare("INSERT INTO messages (conversation_id, sender_id, `message_text`) VALUES (:conversationid, :senderid, :message)");
        $stm->bindParam(':senderid', $userid, PDO::PARAM_INT);
        $stm->bindParam(':conversationid', $conversationid, PDO::PARAM_INT);
        $stm->bindParam(':message', $message, PDO::PARAM_INT);

        if ($stm->execute()) {
            header("location:../readConversation/$conversationid");
        }
        else {
            echo "ss";
        }
    }
}