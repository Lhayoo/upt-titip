<?php

use App\Core\Controller;
use App\Core\Middleware;

class orderInfo extends Controller
{
    public function __construct()
    {
        Middleware::sudah_login();
        Middleware::isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Order Info';
        $data['active'] = 'orderInfo';
        $data['orderInfo'] = $this->model('orderInfoModel')->get_orderInfo();
        $this->view('orderInfo/index', $data, 'default');
    }
}