<?php

use App\Core\Database;

class orderInfoModel extends Database
{
    public function get_OrderInfo()
    {
        $query = $this->connect->query("SELECT * from transaksi order by tanggal_order desc");
        return $query;
    }
}