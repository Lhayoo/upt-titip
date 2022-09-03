<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

    class peminjamanModel extends Database{
        public function get_peminjaman()
        {
            $query = $this->connect->query('SELECT transaksi.id,buku.judul,transaksi.tanggal_pinjam,transaksi.tanggal_kembali,transaksi.status,users.nama FROM transaksi inner join users on transaksi.users_id=users.id inner join buku on transaksi.buku_id=buku.id');
            return $query;
        }
        public function tambah($post)
        {
            $kode_buku = htmlspecialchars($post['kode_buku']);
            $username = htmlspecialchars($post['kode_anggota']);
            $kode_pinjam = $username.'_'.uniqid();
            $tanggal_pinjam = htmlspecialchars($post['tanggal_pinjam']);
            $tanggal_kembali = htmlspecialchars($post['tanggal_kembali']);
            if(empty($kode_buku) && empty($username) && empty($tanggal_pinjam) && empty($tanggal_kembali)){
                Flash::set_flash('Invalid input','danger');
            }else{
            $checkBuku = $this->connect->query("SELECT id,kode_buku FROM buku where `kode_buku`='$kode_buku'");
            $checkUser = $this->connect->query("SELECT id,username FROM users where `username`='$username'");
            if(!$checkBuku->num_rows){
                Flash::set_flash('Invalid kode buku / kode buku belum terdaftar','danger');
            }else if(!$checkUser->num_rows){
                Flash::set_flash('Invalid kode anggota / anggota belum terdaftar','danger');
            }else{
                if($tanggal_pinjam > $tanggal_kembali){
                    Flash::set_flash('Invalid tanggal pinjam','danger');
                }else{
                    $buku_id = $checkBuku->fetch_assoc()['id'];
                    $users_id = $checkUser->fetch_assoc()['id'];
                    $insert = $this->connect->query("INSERT INTO `transaksi` (`kode_transaksi`,`buku_id`, `users_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES ('$kode_pinjam','$buku_id', '$users_id', '$tanggal_pinjam', '$tanggal_kembali', 'pinjam')");
                    if($insert){
                        Flash::set_flash('Peminjaman Berhasil Di buat','success');
                    }
                }
            }
        }
            Controller::redirect(BASE_URL.'peminjaman/tambah');
        }
        public function hapus()
        {
            $id = htmlspecialchars($_POST['id_peminjaman']);
            $this->connect->query("DELETE FROM transaksi where `id`=$id");
            Flash::set_flash('Berhasil di hapus','success');
            Controller::redirect(BASE_URL.'peminjaman');
        }
        public function get_peminjaman_by_id($id)
        {
            return $this->connect->query("SELECT * FROM transaksi where id='$id' limit 1")->fetch_assoc();
        }
        public function update($post,$id)
        {
            $tanggal_pinjam = htmlspecialchars($post['tanggal_pinjam']);
            $tanggal_kembali = htmlspecialchars($post['tanggal_kembali']);
            $status = htmlspecialchars($post['status']);
            if(empty($tanggal_pinjam) && empty($tanggal_kembali) && empty($status)){
                Flash::set_flash('Invalid input','danger');

            }else{
            if($tanggal_pinjam > $tanggal_kembali){
                Flash::set_flash('Invalid tanggal pinjam','danger');
            }else{
                $update = $this->connect->query("UPDATE `transaksi` SET `tanggal_pinjam` = '$tanggal_pinjam',`tanggal_kembali` = '$tanggal_kembali',`status`='$status' WHERE `id` = $id; ");
                if($update){
                    Flash::set_flash('Peminjaman Berhasil Di update','success');
                }else{
                    Flash::set_flash('Peminjaman Berhasil Di di update','gagal');
                }
            Controller::redirect(BASE_URL.'peminjaman');
            }
            }
        }
}
?>