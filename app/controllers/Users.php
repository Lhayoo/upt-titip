<?php

use App\Core\Controller;
use App\Core\Middleware;

class users extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Data Anggota';
        $data['active'] = 'users';
        $data['users'] = $this->model('usersModel')->get_user();
        $this->view('users/index', $data, 'default');
    }
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['active'] = 'users';
            $data['title'] = 'Tambah Anggota';
            $this->view('users/tambah', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('usersModel')->tambah($_POST);
        }
    }
    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = htmlspecialchars($_POST['id_user']);
            return $this->model('usersModel')->hapusUsers($id);
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Ubah Anggota';
            $data['active'] = 'users';
            $data['id'] = $this->model('usersModel')->get_anggotaById($id);
            $this->view('users/edit', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('usersModel')->update($_POST, $id);
        }
    }
}