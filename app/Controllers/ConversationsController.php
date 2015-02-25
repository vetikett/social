<?php namespace App\Controllers;

require_once 'UsersController.php';

use App\Db;
use PDO;
use Core\BaseClasses\View;

class ConversationsController {

    public function indexAction($id) {
        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM conversations WHERE user_1 = '$id' OR user_2 = '$id'");

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

        $stm = $db->prepare("SELECT * FROM conversations WHERE conversations.user_1 = '$user_id' OR conversations.user_2 = '$user_id'");

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

        $yada = new UsersController();
        $counter=0;
        foreach ($conversation_ids as $conid) {
            if ($_SESSION['user']->id != $conid['user_1']) {
                $userarray[] = $yada->getAllUsersAction($conid['user_1']); // Hämtar från usercontrollern
                ?>
                <a href="../../conversations/getConversation/<?php echo $conid['id'];?>">
                    <div class="sfl" onmouseover="hover(this);" onmouseout="unhover(this);">
                        <img class="userimg" src="../../imgs/viktormeidal.png">
                        <div class="sfl_info">
                            <span class="sf_user"><?php echo $userarray[0][$counter]->username;?></span>
                        </div>
                    </div></a>
                <?php
            }
            if ($_SESSION['user']->id != $conid['user_2']) {
                $userarray[] = $yada->getAllUsersAction($conid['user_2']); // Hämtar från usercontrollern
                ?>
                <a href="../../conversations/getConversation/<?php echo $conid['id'];?>">
                    <div class="sfl" onmouseover="hover(this);" onmouseout="unhover(this);">
                        <img class="userimg" src="../../imgs/viktormeidal.png">
                        <div class="sfl_info">
                             <span class="sf_user"><?php echo $userarray[$counter][0]->username;?></span>
                        </div>
                    </div></a>
            <?php
            }
            $counter++;
        }

    }

    public function getConversationAction() {
        $db = Db::get();
        var_dump($db);
    }

    public function createConversationAction() {

    }

    public function saveConversationAction() {

    }

    public function sendMessageAction() {

    }
}