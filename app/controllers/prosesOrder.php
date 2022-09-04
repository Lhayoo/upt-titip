<?php

use App\Core\Controller;

class prosesOrder extends Controller
{
    public function index()
    {
        $data['title'] = 'Proses Order';
        $data['active'] = 'prosesOrder';
        $this->view('prosesOrder/index', $data, 'default');
    }
    public function prosesBuy()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('prosesOrderModel')->prosesBuy($_POST);
        }
    }
    public function orderComplete()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('prosesOrderModel')->done($_POST);
        }
    }
}