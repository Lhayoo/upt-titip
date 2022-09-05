<?php

use App\Core\Database;

class menuOrderModel extends Database
{
    public function getMenu()
    {
        return $this->connect->query('SELECT * FROM menu');
    }
    public function get_menuById($id)
    {
        return $this->connect->query("SELECT * FROM menu WHERE id='$id' LIMIT 1")->fetch_assoc();
    }
    public function detail()
    {
        return $this->connect->query("SELECT * FROM menu");
    }
}