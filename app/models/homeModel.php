<?php

use App\Core\Database;

    class homeModel extends Database{
        public function get_all()
        {
            $info = [];
            $info['total_buku'] = $this->connect->query('SELECT * from buku')->num_rows;
            $info['total_peminjam'] = $this->connect->query('SELECT * from transaksi')->num_rows;
            $info['total_users'] = $this->connect->query('SELECT * from users where `role`="anggota"')->num_rows;
            $info['total_rak'] = $this->connect->query('SELECT * from rak')->num_rows;
            return $info;
        }
        public function grafik()
        {
            $grafik = $this->connect->query('SELECT tanggal_pinjam,count(*) as "total_pinjam" FROM transaksi group by tanggal_pinjam order by tanggal_pinjam desc limit 5');
            $arr= [];
            while($gr = $grafik->fetch_assoc()){
                $arr[] = $gr;
            }
            return $arr;
        }
    }   

?>