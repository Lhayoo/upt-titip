<?php

namespace App\Core;

use App\Core\View;

class Controller
{
    public function view($view, $data = [], $template)
    {
        $this->render = new View($view, $data, $template);
    }
    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }
    public static function redirect($url)
    {
        return header('Location:' . $url);
    }
}