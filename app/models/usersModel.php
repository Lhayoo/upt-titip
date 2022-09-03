<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

    class usersModel extends Database{
        public function get_user()
        {
            return $this->connect->query("SELECT * FROM users where `role`='anggota'");
        }
        public function tambah($post)
        {
            $nama = htmlspecialchars($post['nama']);
            $username = htmlspecialchars($post['username']);
            $password = htmlspecialchars($post['password']);
            if(empty($name) && empty($username) && empty($password)){
                Flash::set_flash('Invalid input','danger');
            }else{
                $check = $this->connect->query("SELECT * from users where `username` ='$username'")->num_rows;
                if($check){
                    Flash::set_flash('Username sudah ada','danger');
                }else{
                    $insert = $this->connect->query("INSERT INTO `users` (`nama`, `username`, `password`, `role`) VALUES ('$nama', '$username', '$password', 'anggota')");
                    if($insert){
                        Flash::set_flash('Berhasil menambahkan anggota','success');
                    }else{
                        Flash::set_flash('Gagal menambahkan anggota','danger');
                    }
                }
            }
            Controller::redirect(BASE_URL.'users/tambah');
        }
        public function hapus($post)
        {
            $id =htmlspecialchars($post['id_user']);
            $this->connect->query("DELETE FROM `users` WHERE `users`.`id` = $id");
            Flash::set_flash('Berhasil Menghapus anggota','success');
            Controller::redirect(BASE_URL.'users');
        }
        public function get_anggota_by_id($id)
        {
            return $this->connect->query("SELECT * FROM users where id='$id' and `role`='anggota' limit 1")->fetch_assoc();
        }
        public function update($post,$id)
        {
            $nama = htmlspecialchars($post['nama']);
            $username = htmlspecialchars($post['username']);
            $password = htmlspecialchars($post['password']);
            if(empty($name) && empty($username) && empty($password)){
                Flash::set_flash('Invalid input','danger');
            }else{
                $check = $this->connect->query("SELECT * from users where `username` ='$username'")->num_rows;
                if($check){
                    Flash::set_flash('Username sudah ada','danger');
                }else{
                    $insert = $this->connect->query("UPDATE `users` SET `nama` = '$nama',`username` = '$username',`password` = '$password' WHERE `users`.`id` = $id ");
                    if($insert){
                        Flash::set_flash('Berhasil menambahkan anggota','success');
                    }else{
                        Flash::set_flash('Gagal menambahkan anggota','danger');
                    }
                }
            }
            Controller::redirect(BASE_URL.'users');
        }
    }
?>