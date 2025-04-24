<?php
class UserController {
    public function getAll() {
        $user = Model::load('User');
		$db = new Database();
		$res = $db->query('select * from user');
		$res = $user->getUserByUsername('ehsan');
		var_dump($res);
    }

    public function login() {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            return false;
        }
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if (empty($username) || empty(
            $password)) {
            return false;
        }

        // Instantiate User model
        $user = Model::load('User');
        $res = $user->getUserByUsername($username);

        if ($res == false) {
            return false;
        } else {
            if ($res['password'] == sha1($password)) {
                $_SESSION['user']['logged'] = 1;
                $_SESSION['user']['agent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['user']['ip'] = $_SERVER['REMOTE_ADDR'];

                header('Location: ' . Url::getBaseUrl());
            }
        }
    }
}