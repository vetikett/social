<?php namespace Core\BaseClasses;

class View {

    static public function render($template, $data = NULL) {
        require_once 'resources/views/'. $template .".php";
        $data;
    }
}