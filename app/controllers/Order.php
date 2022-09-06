<?php

use App\Core\Controller;
use App\Core\Middleware;

class Order extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAnggota();
    }
    public function index()
    {
        $data['title'] = 'Order';
        $data['active'] = 'order';
        $data['order'] = $this->model('orderModel')->get_orderinfo();
        $this->view('order/index', $data, 'default');
        $data['riwayat'] = $this->model('AnggotaModel')->riwayat();
    }
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Tambah Order';
            $data['active'] = 'order';
            $data['menu'] = $this->model('orderModel')->get_menu();
            // $data['id_menu'] = $this->model('orderModel')->get_menuById();
            $this->view('order/tambah', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('orderModel')->tambah($_POST);
        }
    }
}