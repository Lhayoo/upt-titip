<?php

use App\Core\Controller;

class Forbiden extends Controller
{
    public function index()
    {
        $data['title'] = 'Akses Ditolak';
        $this->view('404/index', $data, 'default');
    }
}