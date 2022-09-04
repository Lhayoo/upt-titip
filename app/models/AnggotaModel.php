<?php

use App\Core\Database;

class AnggotaModel extends Database
{
    public function get_info()
    {
        $info = [];
        $user_id = $_SESSION['user']['id'];
        $info['total_order'] = $this->connect->query("SELECT * from transaksi where `users_id`='$user_id'")->num_rows;
        $info['orderan_aktif'] = $this->connect->query("SELECT * from transaksi where `users_id`='$user_id' and `status`='aktif'")->num_rows;
        $info['orderan_selesai'] = $this->connect->query("SELECT * from transaksi where `users_id`='$user_id' and `status`='done'")->num_rows;
        return $info;
    }
    public function riwayat()
    {
        $user_id = $_SESSION['user']['id'];
        $date = date('Y-m-d');
        // tampilkan data orderan yang sudah selesai
        $riwayat = $this->connect->query("SELECT * from transaksi where `users_id`='$user_id' order by tanggal_order desc");
        return $riwayat;
    }
}