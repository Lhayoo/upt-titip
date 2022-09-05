<?php

use App\Core\Database;

class orderInfoModel extends Database
{
    public function get_OrderInfo()
    {
        // $query = $this->connect->query("SELECT * from transaksi WHERE `status`= 'aktif' order by tanggal_order desc");
        $query = $this->connect->query("SELECT `transaksi`.`kode_order`,`transaksi`.`tanggal_order`,`menu`.`nama_makanan`,`transaksi`.`jumlah`,`transaksi`.`subtotal`,`transaksi`.`status` from transaksi,menu WHERE `transaksi`.`menu_id`=`menu`.`id` AND `status`='aktif ' order by tanggal_order desc");
        return $query;
    }
}