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
        $data['order'] = $this->model('orderModel')->get_infoOrder();
        // $data['riwayat'] = $this->model('AnggotaModel')->riwayat();
        // $this->view('anggota/index', $data, 'default');
    }
    public function addOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $data['title'] = 'Tambah Order';
            $data['active'] = 'order';
            $this->view('order/tambah', $data, 'default');
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('orderModel')->simpanOrder($_POST);
        }
    }
}