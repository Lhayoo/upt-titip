<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class authModel extends Database
{
    public function login($post)
    {
        $username = htmlspecialchars($post['username']);
        $password = htmlspecialchars($post['password']);
        $login = $this->connect->query("SELECT * from users where username='$username' and password='$password' limit 1");
        if ($login->num_rows) {
            $user = $login->fetch_assoc();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $id = $user['id'];
            $date = date('Y-m-d');
            $this->connect->query("UPDATE `users` SET `last_login` = '$date' WHERE `id` = $id");
            if ($user['role'] == 'admin') {
                Controller::redirect(BASE_URL);
            } else {
                Controller::redirect(BASE_URL . 'anggota');
            }
        } else {
            Flash::set_flash('Invalid Username dan Password', 'danger');
            Controller::redirect(BASE_URL . 'login');
        }
    }
}