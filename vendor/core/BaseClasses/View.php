<?php namespace Core\BaseClasses;

class View {

    static public function render($template, $data = NULL) {

        // makes a variable where both the name and content reflects what is inserted in the controller
        if ($data != null) {
            $paramName = array_keys($data)[0];
            $$paramName = $data[$paramName];
        }

        require_once 'resources/views/'. $template .".php";
    }
}