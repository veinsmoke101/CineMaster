<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;


class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /home');
    }

    public function login(){
        session_start();
        if(isset($_SESSION['user_id'])){
            header('Location: /post');
        }else{
            if(isset($_POST['submit'])){
                $data = array(
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                );
                if($this->user->checkUserByEmail($data['email'])) {
                    $user = $this->user->getUserByEmail($data['email']);
                    if(password_verify($data['password'],$user['user_password'])){
                        $_SESSION['user_id'] = $user['user_id'];
                        header('Location: /post');
                    }
                }else {
                    return $this->render('login',array( 'error' => 'Invalid email or password'));
                }
            }
            return $this->render('login',array( 'error' => ''));
        }

    }


    public function register(){
        session_start();

        if(isset($_SESSION['user_id'])){
            header('Location: /post');
        }else{
            if(isset($_POST['submit'])){

                $data = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'birthdate' => $_POST['birthdate'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                );



                if($this->user->addUser($data)){
                    header('Location: /login');
                }
                else {
                    return $this->render('register');
                }
            }

            return $this->render('register');
        }
        }

}