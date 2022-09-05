<?php

use App\Core\Controller;
use App\Core\Middleware;

class Home extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAdmin();
    }
    public function index()
    {
        $data['active'] = 'Dashboard';
        $data['title'] = 'home';
        $data['info'] = $this->model('homeModel')->get_all();
        $this->view('home/index', $data, 'default');
        $data['riwayat'] = $this->model('AnggotaModel')->riwayat();
    }
    public function grafik()
    {
        echo json_encode($this->model('homeModel')->grafik());
    }
}