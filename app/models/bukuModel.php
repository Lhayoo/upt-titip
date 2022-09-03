<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

    class BukuModel extends Database{
        public function getBuku()
        {
            return $this->connect->query('SELECT buku.id,buku.judul,buku.stok,buku.kode_buku,rak.rak FROM buku left join rak on buku.rak_id = rak.id');
        }
        public function simpanBuku($post)
        {
            $judul = htmlspecialchars($post['judul']);
            $penulis = htmlspecialchars($post['penulis']);
            $penerbit = htmlspecialchars($post['penerbit']);
            $pengarang = htmlspecialchars($post['pengarang']);
            $tahun_terbit = htmlspecialchars($post['tahun_terbit']);
            $stok = htmlspecialchars($post['stok']);
            $rak_id = htmlspecialchars($post['rak_id']);
            $name_cover = $_FILES['cover']['name'];
            $tmp_cover = $_FILES['cover']['tmp_name'];
            $x = explode('.',$name_cover);
            $ext = end($x);
            $kode_buku = uniqid();
            if(!empty($judul) && !empty($penulis)&& !empty($penerbit)&& !empty($pengarang)&& !empty($tahun_terbit)&& !empty($stok)&& !empty($rak_id)){
                if(!in_array($ext,['jpg','png','jpeg'])){
                    Flash::set_flash('Invalid ekstensi , hanya jpg,jpeg,png','danger');
                    Controller::redirect(BASE_URL.'buku/tambah');
                }else{
                    $insert = $this->connect->query("INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`, `rak_id`, `cover`) VALUES ('$kode_buku', '$judul', '$penulis', '$pengarang', '$penerbit', '$tahun_terbit', '$stok', '$rak_id', '$name_cover')");
                    if($insert){
                        if(!is_dir('assets/cover')){
                            mkdir('assets/cover');
                        }
                        if(is_dir('assets/cover')){
                            move_uploaded_file($tmp_cover,'assets/cover/'.$name_cover);
                        }
                        Flash::set_flash('Berhasil Menambahkan buku','success');
                        Controller::redirect(BASE_URL.'buku/tambah');
                    }
                }
            }else{
                Flash::set_flash('Invalid input value','danger');
                Controller::redirect(BASE_URL.'buku/tambah');
            }
        }
        public function get_rak()
        {
            return $this->connect->query('SELECT * FROM rak');
        }
        public function hapusBuku($id)
        {
            $all = $this->connect->query("SELECT cover FROM buku where id='$id' limit 1")->fetch_assoc();
            if(file_exists('assets/cover/'.$all['cover'])){
                unlink('assets/cover/'.$all['cover']);
            }   
            $this->connect->query("DELETE FROM buku where id='$id'");
            Flash::set_flash('Berhasil Menghapus Buku','success');
            Controller::redirect(BASE_URL.'buku');
        }
        public function get_buku_by_id($id)
        {
           return $this->connect->query("SELECT * FROM buku where id='$id' limit 1")->fetch_assoc();
        }
        public function update($post,$id)
        {
            $judul = htmlspecialchars($post['judul']);
            $penulis = htmlspecialchars($post['penulis']);
            $penerbit = htmlspecialchars($post['penerbit']);
            $pengarang = htmlspecialchars($post['pengarang']);
            $tahun_terbit = htmlspecialchars($post['tahun_terbit']);
            $stok = htmlspecialchars($post['stok']);
            $rak_id = htmlspecialchars($post['rak_id']);
            $name_cover = $_FILES['cover']['name'];
            $tmp_cover = $_FILES['cover']['tmp_name'];
            $x = explode('.',$name_cover);
            $ext = end($x);
            $kode_buku = uniqid();
            if(!empty($judul) && !empty($penulis)&& !empty($penerbit)&& !empty($pengarang)&& !empty($tahun_terbit)&& !empty($stok)&& !empty($rak_id)){
               if($_FILES['cover']['name'] != ''){
                if(!in_array($ext,['jpg','png','jpeg'])){
                    Flash::set_flash('Invalid ekstensi , hanya jpg,jpeg,png','danger');
                    Controller::redirect(BASE_URL.'buku');
                }else{
                    $old_cover = $this->get_buku_by_id($id)['cover'];
                    if(file_exists('assets/cover/'.$old_cover)){
                        unlink('assets/cover/'.$old_cover);
                    }  
                    $update = $this->connect->query("UPDATE `buku` SET `judul` = '$judul',`penulis`= '$penulis',`pengarang` = '$pengarang',`penerbit` = '$penerbit',`tahun_terbit` = '$tahun_terbit',`stok`='$stok',`rak_id`='$rak_id',`cover`='$name_cover' WHERE `buku`.`id` = $id; ");
                    if($update){
                        if(!is_dir('assets/cover')){
                            mkdir('assets/cover');
                        }
                        if(is_dir('assets/cover')){
                            move_uploaded_file($tmp_cover,'assets/cover/'.$name_cover);
                        }
                        Flash::set_flash('Berhasil Mengedit buku','success');
                        Controller::redirect(BASE_URL.'buku');
                    }
                }
               }else{
                $update = $this->connect->query("UPDATE `buku` SET `judul` = '$judul',`penulis`= '$penulis',`pengarang` = '$pengarang',`penerbit` = '$penerbit',`tahun_terbit` = '$tahun_terbit',`stok`='$stok',`rak_id`='$rak_id' WHERE `buku`.`id` = $id; ");
                if($update){
                    Flash::set_flash('Berhasil Mengedit buku','success');
                    Controller::redirect(BASE_URL.'buku');
                }
               }
            }else{
                Flash::set_flash('Invalid input value','danger');
                Controller::redirect(BASE_URL.'buku');
            }
        }
    }
?>