<?php namespace App\Controllers;

use App\Db;
use PDO;
use Core\BaseClasses\View;

class AuthController {

    protected $errors;

    // indexAction method will be triggered at
    // both example.com/users/index AND example.com/users
    // this convention is true for all controllers. So if you want
    // an action for example "example.com/posts" just name is "indexAction".

    public function loginAction() {
        return View::render('auth/login');
    }

    public function postLoginAction() {
        // SQL
        // if email and pass is OK?
        // put that user row into session below.
        // session_start()
        $_SESSION['user'] = "user row goes here";

        // just a debug to see that the data comes in to the $_POST super global.
        var_dump($_POST);

    }

    public function logout() {
        // session_destroy();

    }

    public function registerAction() {
        return View::render('auth/register');
    }

    public function postRegisterAction() {

        if ( isset($_POST['register']) ) {
            $username =  $this->validateUsername($_POST['username']);
            $email = $this->validateEmail($_POST['email']);
            $password = $this->validatePasswordMatch($_POST['password'], $_POST['re_password']);

            if ( $username && $email && $password ) {
                // If input is valid above?
                // Do SQL to insert into db

                // if db insert is a success? try to also login, below.
                // $this->postLoginAction()

                // just a debug
                var_dump($_POST);
            } else {
                // if validation fails above. Send the same view again but this time
                // with $errors.
                // Look at validateUsername method for example.
                // Also check the auth/register view for example on how to
                // loop out existing erros for the user to see. So the user
                // know what went wrong.
                
                $errors = $this->errors;
                return View::render('auth/register', compact('errors'));
            }
        }
    }


    // Validation methods for registraion and login input.
    // Example: validateUsername method uses the filterinput method and after that it says,
    // the username length needs to be more or equal to 5.

    protected function validateUsername($username) {
        $username = $this->filterInput($username);

        if ( strlen($username) <= 5 ) {
            $this->errors[] = 'Username must be at least 6 characters';
            return false;
        }

        return $username;
    }

    protected function validateEmail($email) {
        return true;
    }

    protected function validatePassword($password) {
        return true;
    }

    protected function validatePasswordMatch($password, $re_password) {
        return true;
    }

    // basic filter for input content.
    protected function filterInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }
}