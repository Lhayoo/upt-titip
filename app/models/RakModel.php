<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

    class RakModel extends Database{
        public function get_rak()
        {
            return $this->connect->query('SELECT rak.id,rak.rak,count(buku.id) as "jumlah_buku" from rak left join buku on buku.rak_id=rak.id group by rak');
        }
        public function tambah($post)
        {
            $rak = htmlspecialchars($post['rak']);
            if(empty($rak)){
                Flash::set_flash('Invalid input','danger');
            }else{
                $insert = $this->connect->query("INSERT INTO `rak` (`rak`) VALUES ('$rak');");
                if($insert){
                    Flash::set_flash('Berhasil menambahkan rak','success');
                }else{
                    Flash::set_flash('Gagal menambahkan rak','danger');
                }
            }
            Controller::redirect(BASE_URL.'rak');
        }
        public function hapus($post)
        {
            $id = htmlspecialchars($post['rak_id']);
            $this->connect->query("DELETE FROM rak where `id`=$id");
            Controller::redirect(BASE_URL.'rak');
            Flash::set_flash('Berhasil menghapus rak','success');
        }
        public function get_rak_by_id($id)
        {
            return $this->connect->query("SELECT * FROM rak where id='$id' limit 1")->fetch_assoc();
        }
        public function update($post)
        {
            $rak = htmlspecialchars($post['rak']);
            $id = htmlspecialchars($post['rak_id']);
            if(empty($rak) && empty($id)){
                Flash::set_flash('Invalid input','danger');
            }else{
                $update = $this->connect->query("UPDATE `rak` SET `rak` = '$rak' WHERE `rak`.`id` = $id");
                if($update){
                    Flash::set_flash('Berhasil Mengupdate rak','success');
                }else{
                    Flash::set_flash('Gagal Mengupdate rak','danger');
                }
            }
            Controller::redirect(BASE_URL.'rak');

        }
    }
?>