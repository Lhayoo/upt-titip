<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

    class pengembalianModel extends Database{
        public function kembali($post)
        {
            if(empty($post['kode_pinjam'])){
                Flash::set_flash('invalid input','danger');
            }else{
                $kode = htmlspecialchars($post['kode_pinjam']);
                $check = $this->connect->query("SELECT kode_transaksi from transaksi where `kode_transaksi`='$kode'")->num_rows;
                if(!$check){
                    Flash::set_flash('Invalid kode','danger');
                }else{
                    $update = $this->connect->query("UPDATE transaksi set `status`='kembali' where `kode_transaksi`='$kode'");
                    $id_transaksi = $this->connect->query("SELECT id FROM transaksi where `kode_transaksi`='$kode' limit 1")->fetch_assoc()['id'];
                    $check_denda = $this->connect->query("SELECT * FROM denda where `transaksi_id`='$id_transaksi'")->num_rows;
                    if($check_denda){
                        $this->connect->query("DELETE FROM denda where `transaksi_id`='$id_transaksi'");
                    }
                    if($update){
                        Flash::set_flash('Transaksi berhasil','success');
                    }else{
                        Flash::set_flash('SERVER ERROR','danger');
                    }
                }
            }
            Controller::redirect(BASE_URL.'pengembalian');
        }
    }
?>