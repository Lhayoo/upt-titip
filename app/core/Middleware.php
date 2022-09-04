<?php

namespace App\Core;

class Middleware
{
    public static function sudah_login()
    {
        if (!isset($_SESSION['login'])) {
            return Controller::redirect(BASE_URL . 'login');
        }
    }
    public static function belum_Login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['user']['role'] == 'admin') {
                return Controller::redirect(BASE_URL);
            } else {
                return Controller::redirect(BASE_URL . 'anggota');
            }
        }
    }
    public static function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] != 'admin') {
                return Controller::redirect(BASE_URL . 'anggota');
            }
        }
    }
    public static function isAnggota()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] != 'anggota') {
                return Controller::redirect(BASE_URL . 'forbiden');
            }
        }
    }
}