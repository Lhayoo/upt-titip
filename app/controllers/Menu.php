<?php

use App\Core\Controller;
use App\Core\Middleware;

class Menu extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Data Menu';
        $data['active'] = 'menu';
        $data['menu'] = $this->model('menuModel')->getMenu();
        $this->view('menu/index', $data, 'default');
    }
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Tambah Menu';
            $data['active'] = 'menu';
            $this->view('menu/tambah', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('MenuModel')->simpanMenu($_POST);
        }
    }
    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = htmlspecialchars($_POST['id']);
            return $this->model('menuModel')->hapusMenu($id);
        }
    }
    public function detail($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Detail Menu';
            $data['active'] = 'menu';
            $data['menu'] = $this->model('MenuModel')->getMenuById($id);
            $this->view('menu/detail', $data, 'default');
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Ubah Menu';
            $data['active'] = 'menu';
            $data['menu'] = $this->model('MenuModel')->getMenuById($id);
            $this->view('menu/edit', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('menuModel')->update($_POST, $id);
        }
    }
}