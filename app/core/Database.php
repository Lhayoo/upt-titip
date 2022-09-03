<?php

namespace App\Core;

use mysqli;

include_once "./app/config/constant.php";
class Database
{
    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $db = DB;
    protected $connect;
    public function __construct()
    {
        $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->connect->connect_errno) {
            die("DATABASE KONEKSI ERROR");
            exit();
        }
    }
}