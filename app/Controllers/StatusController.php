<?php namespace App\Controllers;
require_once('resources/views/header.php');

use App\Db;
use PDO;
use Core\BaseClasses\View;

class StatusController {

    public function indexAction() {
        $user = $_SESSION['user'];
        $userid = $user->id;
        $db = Db::get();
        $stm = $db->prepare("SELECT * FROM users
        JOIN friends on users.id = friends.requester_id OR users.id = friends.respondent_id
        WHERE friends.requester_id = :userid OR friends.respondent_id = :userid GROUP BY users.id ORDER BY users.updated DESC");
        $stm->bindParam(':userid', $userid, PDO::PARAM_INT);

        if ($stm->execute()) {
            return View::render('status/index', compact('stm'));
        }
        else {
            require_once '404.php';
        }
    }
}