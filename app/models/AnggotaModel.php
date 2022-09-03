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
        // $info['total_denda'] = $this->connect->query("SELECT sum(denda) as 'total_denda' from denda where `users_id`='$user_id'")->fetch_assoc();
        return $info;
    }
    public function riwayat()
    {
        $user_id = $_SESSION['user']['id'];
        $date = date('Y-m-d');
        return $this->connect->query("SELECT buku.judul,transaksi.kode_transaksi,transaksi.tanggal_pinjam,transaksi.tanggal_kembali,transaksi.status,concat(DATEDIFF(transaksi.tanggal_kembali,'$date'),' hari') as 'telat_concat' FROM transaksi inner join buku on buku.id=transaksi.buku_id where `users_id`='$user_id' order by tanggal_pinjam desc limit 5");
    }
}