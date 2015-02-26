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
        // get variables
        $password = $_POST['password'];
        $email = $_POST['email'];

        // check if fields are empty
        // if not, get username and password from database
        if((!empty($password)) && (!empty($email))) {

            $db = Db::get();
            $stm = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
            $stm->bindParam(":email", $email, PDO::PARAM_STR);
            $stm->bindParam(":password", $password, PDO::PARAM_STR);
            $stm->execute();

            // if there is a result, send to user profile
            if ($stm->rowCount() == 1) {
                $user = $stm->fetchObject();
                session_start();
                $_SESSION['user'] = $user;

                // redirected to userpage
                //return View::render('users/index', compact('user'));
                header("location:../status/");
            }
            // if not, return error in $msg
            else {
                $msg =  "Wrong username or password";
                return $msg;
            }

        }
        // if not, return error in $msg
        else {
            $msg = "You forgot to insert password or email";
            return $msg;
        }
    }


    public function logoutAction() {
        session_start();
        session_unset();
        //session_destroy();
        return View::render('auth/login');
    }

    public function registerAction() {
        return View::render('auth/register');
    }

    public function postRegisterAction() {

        if ( isset($_POST['register']) ) {

            $username =  $this->validateUsername($_POST['username']);
            $email = $this->validateEmail($_POST['email']);
            $password = $this->validatePassword($_POST['password']); // , $_POST['re_password']);

           if ( $username && $email && $password ) {
                // connect to db and add new user
                $db = Db::get();    // Db::get() is set short for the db connection
                $stm = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password) ");
                $stm->bindParam(":username", $username, PDO::PARAM_STR);
                $stm->bindParam(":email", $email, PDO::PARAM_STR);
                $stm->bindParam(":password", $password, PDO::PARAM_STR);

               // if db insert is successful, send user to login
                if($stm->execute()) {
                    var_dump($_POST);


                    // if db insert is a success send to login
                    return View::render('auth/login');

                }

                // just a debug

           } else {
                // if validation fails above. Send the same view again but this time
                // with $errors.
                // Look at validateUsername method for example.
                // Also check the auth/register view for example on how to
                // loop out existing errors for the user to see. So the user
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
        $email = $this->filterInput($email);

        return $email;
    }

    protected function validatePassword($password) {
        $password = $this->filterInput($password);

        if ( strlen($password) <= 5 ) {
            $this->errors[] = 'Password must be at least 6 characters';
            return false;
        }

        return $password;
    }

   /* protected function validatePasswordMatch($password, $re_password) {
        return true;
    } */


    // basic filter for input content.
    protected function filterInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }
}