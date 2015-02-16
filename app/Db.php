<?php namespace App;

use PDO;

class Db {

    static public function get() {
        return new PDO('mysql:host=db4free.net;dbname=wiesocial;charset=utf8', 'wiesocial', 'Medie2014');
    }
}