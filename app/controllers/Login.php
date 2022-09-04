<?php

use App\Core\Controller;
use App\Core\Middleware;

class login extends Controller
{
    public function __construct()
    {
        Middleware::belum_login();
    }
    public function index()
    {
        $this->view('auth/index', null, 'auth');
    }
    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            return $this->model('authModel')->login($_POST);
        }
    }
}