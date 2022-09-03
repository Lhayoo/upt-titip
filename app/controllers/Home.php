<?php

use App\Core\Controller;
use App\Core\Middleware;

class Home extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAnggota();
    }
    public function index()
    {
        $data['title'] = 'home';
        $data['active'] = 'Dashboard';
        $this->view('home/index', $data, 'default');
    }
    public function grafik()
    {
        echo json_encode($this->model('homeModel')->grafik());
    }
}