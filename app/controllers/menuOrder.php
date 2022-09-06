<?php

use App\Core\Controller;
use App\Core\Middleware;

class MenuOrder extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAnggota();
    }
    public function index()
    {
        $data['title'] = 'Menu';
        $data['active'] = 'menuOrder';
        $data['menuOrder'] = $this->model('menuOrderModel')->getMenu();
        $this->view('menuOrder/index', $data, 'default');
    }
    public function detail($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title']  = 'Detail Menu';
            $data['active'] = 'menuOrder';
            $id = htmlspecialchars($id);
            $data['id'] = $this->model('menuOrderModel')->get_menuById($id);
            $this->view('menuOrder/detail', $data, 'default');
        }
    }
}