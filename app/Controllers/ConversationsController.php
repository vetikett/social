<?php namespace App\Controllers;

use App\Db;
use PDO;
use Core\BaseClasses\View;

class ConversationsController {

    public function indexAction() {
        $db = Db::get();
        $stm = $db->prepare('SELECT * FROM conversations');
        $stm->execute();

        $conversations = $stm->fetchAll(PDO::FETCH_OBJ);

        return View::render('conversations/index', compact('conversations'));

    }

    public function getConversationAction() {

    }

    public function createConversationAction() {

    }

    public function saveConversationAction() {

    }

    public function sendMessageAction() {

    }
}