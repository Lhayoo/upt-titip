<?php

use App\Core\Database;

class homeModel extends Database
{
    public function get_all()
    {
        $info = [0];
        $info['total_menu'] = $this->connect->query('SELECT * from menu')->num_rows;
        $info['total_orderan'] = $this->connect->query('SELECT * from transaksi')->num_rows;
        $info['total_users'] = $this->connect->query('SELECT * from users where `role`="anggota"')->num_rows;
        $info['total_aktif'] = $this->connect->query('SELECT * from transaksi where `status`="aktif"')->num_rows;
        $info['total_done'] = $this->connect->query('SELECT * from transaksi where `status`="done"')->num_rows;
        return $info;
    }
    public function grafik()
    {
        $grafik = $this->connect->query('SELECT tanggal_order,count(*) as "total_order" FROM transaksi group by tanggal_order order by tanggal_order desc limit 5');
        $arr = [];
        while ($gr = $grafik->fetch_assoc()) {
            $arr[] = $gr;
        }
        return $arr;
    }
    public function get_riwayat()
    {
        $riwayat = $this->connect->query("SELECT * from menu,transaksi,users where `transaksi`.`users_id`=`users`.`id` AND `transaksi`.`menu_id`=`menu`.`id` AND `status`='done' order by tanggal_order desc");
        return $riwayat;
    }
}