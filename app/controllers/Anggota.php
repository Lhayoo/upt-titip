<?php

use App\Core\Controller;
use App\Core\Middleware;

class Anggota extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAnggota();
    }
    public function index()
    {
        $data['title'] = 'Anggota';
        $data['active'] = 'anggota';
        $data['info'] = $this->model('AnggotaModel')->get_info();
        $data['riwayat'] = $this->model('AnggotaModel')->riwayat();
        // $data['denda'] = $this->model('AnggotaModel')->denda();
        $this->view('anggota/index', $data, 'default');
    }
}